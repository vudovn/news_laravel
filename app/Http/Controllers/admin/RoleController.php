<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    function index() {
        $title = 'Danh sách vai trò';
        $roles = Role::all();
        return view('admin.pages.role.index',compact(
            'roles',
            'title'
        ));
    }

    function create() {
        $title = 'Tạo vai trò';
        $permissions = Permission::all();

        $permissionsGroup = [];
        foreach ($permissions as $permission) {
            $permissionsGroup[$permission->acc][] = $permission;
        }
        
        $formattedPermissionsGroup = [];
        foreach ($permissionsGroup as $acc => $permissions) {
            $formattedPermissionsGroup[] = [
                'acc' => $acc,
                'permissions' => $permissions
            ];
        }
        
        return view('admin.pages.role.create',compact(
            'formattedPermissionsGroup',
            'title',
        ));
    }

    function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ],[
            'name.required' => 'Tên vai trò không được để trống',
            'name.unique' => 'Tên vai trò đã tồn tại',
        ]);

        //Tạo mới vai trò
        $role = Role::create(['name' => $request->name]);

        //Kiểm tra xem có quyền nào được chọn không, nếu có thì thêm vào bảng role_has_permissions
        if ($request->has('permissions')) {   
            $role->syncPermissions($request->permissions);
        }

        toastr()->success('Tạo vai trò thành công');
        return redirect()->route('admin.role');
    }

    function edit($id) {
        $title = 'Chỉnh sửa vai trò';
        $role = Role::find($id);
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        $permissionsGroup = [];
        foreach ($permissions as $permission) {
            $permissionsGroup[$permission->acc][] = $permission;
        }
        
        $formattedPermissionsGroup = [];
        foreach ($permissionsGroup as $acc => $permissions) {
            $formattedPermissionsGroup[] = [
                'acc' => $acc,
                'permissions' => $permissions
            ];
        }
        return view('admin.pages.role.edit',compact(
            'role',
            'formattedPermissionsGroup',
            'title',
            'rolePermissions'
        ));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|unique:roles,name,'.$id,
        ], [
            'name.required' => 'Tên vai trò không được để trống',
            'name.unique' => 'Tên vai trò đã tồn tại',
        ]);

        $role = Role::find($id);
        $role->update(['name' => $request->name]);

        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        toastr()->success('Cập nhật vai trò thành công');
        return redirect()->route('admin.role');
    }

    public function delete($id) {
        $role = Role::findOrFail($id);
        $role->delete();
        toastr()->success('Xóa vai trò thành công');
        return redirect()->route('admin.role');
    }


}
