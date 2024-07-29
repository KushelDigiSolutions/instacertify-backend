<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:staff-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:staff-create', ['only' => ['store']]);
        $this->middleware('permission:staff-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:staff-delete', ['only' => ['destroy']]);
        $this->middleware('permission:staff-status-change', ['only' => ['status']]);
    }

    public function index(Request $request)
    {
        $search_key = $request->search_key;
        $search_status = $request->search_status;

        $users = User::orderBy('id', 'desc');
        $users = $users->where('user_type','app');
        if ($search_status == 'block' || $search_status == 'unblock') {
            $users = $users->where('status', $search_status);
        }

        if ($search_key) {
            $users = $users->where(function ($query) use ($search_key) {
                $query->where('name', 'like', '%' . $search_key . '%')
                    ->orWhere('email', 'like', '%' . $search_key . '%')
                    ->orWhere('mobile_number', 'like', '%' . $search_key . '%');
            });
        }

        $users = $users->paginate(10);

        if ($request->ajax()) {
            return view('admin.staff.table', compact('users', 'search_key', 'search_status'));
        }

        return view('admin.staff.index', compact('users', 'search_key', 'search_status'), ['page_title' => 'Staff List']);
    }

    public function create()
    {
        return view('admin.staff.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'mobile_number' => 'required|min:9|max:12',
            'email' => 'required|email|max:255|unique:users',
            'timezone' => 'required|max:255',
            'language' => 'required|max:255',
            'address' => 'required|max:255',
            'password' => ['required', 'min:7', 'confirmed'],
            'password_confirmation' => ['required', 'min:7'],
        ]);

        $user = new User;
        $user->name = $request->first_name;
        $user->last_name = $request->last_name;

        $user->email = $request->email;
        $user->timezone = $request->timezone;
        $user->language = $request->language;

        $user->user_type = 'app';
        $user->address = $request->address;
        $user->mobile_number = $request->mobile_number;

        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('admin.staff.index')->with('success', 'Staff Added Successfully!');
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.staff.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'mobile_number' => 'required|min:9|max:12',
            'timezone' => 'required|max:255',
            'language' => 'required|max:255',
            'address' => 'required|max:255',
        ]);

        $user = User::find($id);
        $user->name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->timezone = $request->timezone;
        $user->language = $request->language;
        $user->address = $request->address;
        $user->mobile_number = $request->mobile_number;
        if ($request->password) {
            $this->validate($request, [
                'password' => ['required', 'min:7', 'confirmed'],
                'password_confirmation' => ['required', 'min:7'],
            ]);

            $user->password = Hash::make($request->password);
        }

        $user->save();
        return redirect()->route('admin.staff.index')->with('success', 'Staff Updated Successfully!');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return back()->with('success', 'Staff Deleted Successfully!');
    }

    public function status($id, $status)
    {
        $user = User::find($id);
        $user->status = $status;
        $user->save();

        if ($status == 'block') {
            return back()->with('error', 'Staff Blocked Successfully!');
        } else {
            return back()->with('success', 'Staff Unblocked Successfully!');
        }
    }

    public function changePassword(Request $request, $id)
    {
        return $request->all();
    }

}
