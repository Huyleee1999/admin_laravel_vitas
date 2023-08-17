<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Users;
use App\Models\Admin\City;
use App\Http\Requests\Admin\UsersFormRequest;
use Illuminate\Support\Str;



class UsersController extends Controller
{
    public function index() {
        $users = Users::where('type', '1')->get();
        return view('admin.users.showusers', compact('users'));
    }

    public function showEditUsers($id) {
        $users = Users::find($id);

        $city = City::all();
        return view('admin.users.showeditusers', compact('users', 'city'));
    }

    public function updateUsers(UsersFormRequest $request, $id) {
        $data = $request->validated();

        $users = Users::find($id);
        $users->name = $data['users-name'];
        $users->phone = $data['users-phone'];
        $users->email = $data['users-email'];
        $users->city_id = $data['city_id'];
        $users->slug = Str::slug($data['slug']);
        $users->update();

        return redirect()->route('admin.users')->with('msg', 'Cập nhật người dùng thành công!!');
    }

    public function deleteUsers(Request $request) {
        $users = Users::find($request->user_delete_id);
        if($users) {
            $users->bookings()->delete();
            $users->comments()->delete();
            $users->evaluates()->delete();
            $users->delete();
            return redirect()->route('admin.users')->with('msg', 'Xóa người dùng thành công!!');
        } else {
            return redirect()->route('admin.users')->with('msg', 'Không tìm thấy người dùng để xóa!!');
        }
    }

    // public function showDeleteUsersTrash() {
    //     $users = Users::onlyTrashed()->get();

    //     return view('admin.users.showdeleteforumstrash', compact('users'));
    // }

    // public function forceDeleteUsers($id) {
    //     $users = Users::withTrashed()->find($id);
    //     $users->forceDelete();

    //     return redirect()->back()->with('msg', 'Xóa vĩnh viễn dữ liệu thành công!!');
    // }

    // public function restoreUsers($id) {
    //     $users = Users::withTrashed()->find($id);
    //     $users->restore();

    //     return redirect()->back()->with('msg', 'Khôi phục thành công dữ liệu!!');
    // }
}
