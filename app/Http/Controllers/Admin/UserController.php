<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Admin\Admin;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:user-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:user-create', ['only' => ['store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
        $this->middleware('permission:user-status-change', ['only' => ['status']]);
    }

    public function index(Request $request)
    {
        $search_key = $request->search_key;
        $search_status = $request->search_status;

        $users = Admin::where('id', '!=', 1)->orderBy('id', 'desc');

        if ($search_status == 'block' || $search_status == 'unblock') {
            $users = $users->where('status', $search_status);
        }

        if ($search_key) {
            $users = $users->where(function ($query) use ($search_key) {
                $query->where('name', 'like', '%' . $search_key . '%')
                    ->orWhere('email', 'like', '%' . $search_key . '%')
                    ->orWhere('phone', 'like', '%' . $search_key . '%');
            });
        }

        $users = $users->paginate(10);

        if ($request->ajax()) {
            return view('admin.user.table', compact('users', 'search_key', 'search_status'));
        }

        return view('admin.user.index', compact('users', 'search_key', 'search_status'), ['page_title' => 'Admin List']);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'phone' => 'required|min:9|max:12',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = Admin::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('admin.users.index')->with('success', 'Admin Added Successfully!');
    }

    public function show($id)
    {
        $user = Admin::find($id);

        return view('admin.user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = Admin::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('admin.user.edit', compact('user', 'roles', 'userRole'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'same:confirm-password',
            'phone' => 'required|min:9|max:12',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }
        $user = Admin::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));

        return redirect()->route('admin.users.index')->with('success', 'Admin Updated Successfully!');
    }

    public function destroy($id)
    {
        Admin::where('id', $id)->delete();
        return back()->with('success', 'Admin Deleted Successfully!');
    }

    public function status($id, $status)
    {
        $user = Admin::find($id);
        $user->status = $status;
        $user->save();

        if ($status == 'block') {
            return back()->with('error', 'Admin Blocked Successfully!');
        } else {
            return back()->with('success', 'Admin Unblocked Successfully!');
        }
    }

    public function changePassword(Request $request, $id)
    {
        return $request->all();
    }

}
