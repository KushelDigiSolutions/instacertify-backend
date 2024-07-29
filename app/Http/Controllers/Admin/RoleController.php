<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:role-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $list = Role::orderBy('id', 'DESC')->where('id', '!=', 1)->paginate(20);
        return view('admin.roles.index', compact('list'), ['page_title' => 'All Roles']);
    }

    public function create()
    {
        $permissionParent = Permission::groupBy('parent_name')->orderBy('id', 'ASC')->get();
        return view('admin.roles.create', compact('permissionParent'), ['page_title' => 'Create Role']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
        $role = Role::create([
            'guard_name' => 'admin',
            'name' => $request->input('name')
        ]);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('admin.roles.index')->with('success', 'Role created successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissionParent = Permission::groupBy('parent_name')->orderBy('id', 'ASC')->get();
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')->all();
        return view('admin.roles.edit', compact('role', 'permission', 'rolePermissions', 'permissionParent'), ['page_title' => 'Edit Role']);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));
        // return back();
        return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully');
    }

    public function destroy($id)
    {
        Role::destroy($id);
        return redirect()->route('admin.roles.index')->with('success', 'Role delete successfully');
    }

}
