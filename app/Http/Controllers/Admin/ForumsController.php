<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Forums;
use App\Models\Admin\Topics;
use App\Models\Admin\Users;
use App\Http\Requests\Admin\ForumsFormRequest;
use Illuminate\Support\Str;



class ForumsController extends Controller
{
    public function index() {
        $forums = Forums::all();

        return view('admin.forums.showforums', compact('forums'));
    }

    public function showAddForums() {
        $topics = Topics::all();
        $users = Users::where('type','1')->get();

        return view('admin.forums.showaddforums', compact('topics', 'users'));
    }

    public function addForums(ForumsFormRequest $request) {
        $data = $request->validated();

        $forums = new Forums;
        $forums->name = $data['forums-name'];
        $forums->content = $data['forums-content'];
        $forums->created_by = $data['created_by'];
        $forums->topic_id = $data['topic_id'];
        $forums->slug = Str::slug($data['slug']);
        $forums->is_highlight = $request->is_highlight == true ? '1' : '0';
        $forums->status = $request->status == true ? '1' : '0';

        $forums->save();

        return redirect()->route('admin.forums')->with('msg', 'Thêm diễn đàn thành công!!');
    }

    public function showEditForums($id) {
        $forums = Forums::find($id);
        $topics = Topics::all();
        $users = Users::where('type','1')->get();

        return view('admin.forums.showeditforums', compact('forums', 'topics', 'users'));
    }

    public function updateForums(ForumsFormRequest $request, $id) {
        $data = $request->validated();

        $forums = Forums::find($id);
        $forums->name = $data['forums-name'];
        $forums->content = $data['forums-content'];
        $forums->created_by = $data['created_by'];
        $forums->topic_id = $data['topic_id'];
        $forums->slug = Str::slug($data['slug']);
        $forums->is_highlight = $request->is_highlight == true ? '1' : '0';
        $forums->status = $request->status == true ? '1' : '0';

        $forums->update();

        return redirect()->route('admin.forums')->with('msg', 'Cập nhật diễn đàn thành công!!');
    }

    public function deleteForums(Request $request) {
        $forums = Forums::find($request->forum_delete_id);
        if($forums) {
            $forums->comments()->delete();
            $forums->delete();
            return redirect()->route('admin.forums')->with('msg', 'Xóa diễn đàn thành công!!');
        } else {
            return redirect()->route('admin.forums')->with('msg', 'Không tìm thấy diễn đàn để xóa!!');
        }
    }

    // public function showDeleteForumsTrash() {
    //     $forums = Forums::onlyTrashed()->get();

    //     return view('admin.forums.showdeleteforumstrash', compact('forums'));
    // }

    // public function forceDeleteForums($id) {
    //     $forums = Forums::withTrashed()->find($id);
    //     $forums->forceDelete();

    //     return redirect()->back()->with('msg', 'Xóa vĩnh viễn dữ liệu thành công!!');
    // }

    // public function restoreForums($id) {
    //     $forums = Forums::withTrashed()->find($id);
    //     $forums->restore();

    //     return redirect()->back()->with('msg', 'Khôi phục thành công dữ liệu!!');
    // }
}
