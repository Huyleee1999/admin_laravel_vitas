<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Comments;
use App\Models\Admin\Forums;
use App\Models\Admin\Users;
use App\Http\Requests\Admin\CommentsFormRequest;


class CommentsController extends Controller
{
    public function index() {
        $comments = Comments::all();

        return view('admin.comments.showcomments', compact('comments'));
    }

    public function showEditComments($id) {
        $comments = Comments::find($id);
        $forums = Forums::where('status', '1')->get();
        $users = Users::where('type', '1')->get();

        return view('admin.comments.showeditcomments', compact('comments', 'forums', 'users'));
    }

    public function updateComments(CommentsFormRequest $request, $id) {
        $data = $request->validated();
        
        $comments = Comments::find($id);
        $comments->content = $data['comments-content'];
        $comments->forum_id = $data['forum_id'];
        $comments->user_id = $data['user_id'];
        $comments->status = $request->status == true ? '1' : '0';

        $comments->update();

        return redirect()->route('admin.comments')->with('msg', 'Cập nhật bình luận thành công!!');
    }

    public function deleteComments(Request $request) {
        $comments = Comments::find($request->comment_delete_id);
        if($comments) {
            $comments->delete();
            return redirect()->route('admin.comments')->with('msg', 'Xóa bình luận thành công!!');
        } else {
            return redirect()->route('admin.comments')->with('msg', 'Không tìm thấy bình luận để xóa!!');
        }
    }

    // public function forceDeleteComments($id) {
    //     $comments = Comments::withTrashed()->find($id);
    //     $comments->forceDelete();

    //     return redirect()->back()->with('msg', 'Xóa vĩnh viễn dữ liệu thành công!!');
    // }
    

    // public function showDeleteCommentsTrash() {
    //     $comments = Comments::onlyTrashed()->get();

    //     return view('admin.comments.showdeletecommentstrash', compact('comments'));
    // }

    // public function restoreComments($id) {
    //     $comments = Comments::withTrashed()->find($id);
    //     $comments->restore();

    //     return redirect()->back()->with('msg', 'Khôi phục thành công dữ liệu!!');
    // }
}
