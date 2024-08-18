<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Flasher\Toastr\Laravel\Facade\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); //lấy all user
        $title = "QL thành viên"; //Title trang QL thành viên
        return view("admin.pages.user.index", compact(
            "users",
            'title'
        ));
    }

    public function create()
    {
        $title = "Thêm mới thành viên";
        $roles = Role::all();
        return view("admin.pages.user.create", compact(
            'title',
            'roles'
        ));
    }

    public function store(StoreUserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->save();

        $user->assignRole($request->role); //Thêm quyền cho user vừa tạo

        if ($user) {
            toastr()->success('Thêm thành viên thành công!');
            return redirect()->route('admin.user');
        } else {
            toastr()->error('Thêm thành viên thất bại!');
            return redirect()->back();
        }

    }

    public function edit($id) {

        $title = 'Chỉnh sửa thành viên';
        $roles = Role::all(); //Láy danh sách role
        $user = User::find($id); //Tìm user có id được truyền lên url

        return view('admin.pages.user.edit', compact(
            'title',
            'user',
            'roles',
        ));

    }

    public function update(UpdateUserRequest $request, $id) {

        $userUpdate = User::find($id);
        $userUpdate->name = $request->name;
        $userUpdate->email = $request->email;
        // $userUpdate->role = $request->role;
        $userUpdate->status = $request->status;
        $userUpdate->save();

        $userUpdate->syncRoles($request->role);

        toastr()->success('Cập nhật thành công!');
        return redirect()->back();

    }

    

    public function delete($id)
    {
        $user = User::find($id);
        if($user->posts->count() > 0) {
            toastr()->error('Thành viên này đang chứa bài viết');
            return redirect()->back();
        }
        $user->delete();
        Toastr::success('Xóa thành công!');
        return redirect()->back();
    }


    public function status($id, $status) {
        $user = User::findOrFail($id);
        $user->status = $status;
        $user->save();
        return json_decode($user->id, true);
    }
}
