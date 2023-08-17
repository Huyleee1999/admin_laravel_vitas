<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Tags;
use App\Http\Requests\Admin\TagsFormRequest;

class TagsController extends Controller
{
    public function index() {
        $tags = Tags::all();
        // return view('admin.tags.showtags', compact('tags'));
        return $tags;
    }

    public function showAddTags() {
        return view('admin.tags.showaddtags');
    }

    public function addTags(TagsFormRequest $request) {
        $data = $request->validated();

        $tags = new Tags;
        $tags->name = $data['tags-name'];
        $tags->status = $request->status == true ? '1' : '0';
        $tags->save();

        return redirect()->route('admin.tags')->with('msg', 'Thêm tag thành công!!');
    }

    public function showEditTags($id) {
        $tags = Tags::find($id);
        return view('admin.tags.showedittags', compact('tags'));
    }

    public function updateTags(TagsFormRequest $request ,$id) {
        $data = $request->validated();

        $tags = Tags::find($id);
        $tags->name = $data['tags-name'];
        $tags->status = $request->status == true ? '1' : '0';
        $tags->update();

        return redirect()->route('admin.tags')->with('msg', 'Cập nhật tag thành công!!');
    }

    public function deleteTags(Request $request) {
        $tags = Tags::find($request->tag_delete_id);
        if($tags) {
            // $tags->programs()->delete();
            $tags->tagprograms()->delete();
            $tags->delete();
            return redirect()->route('admin.tags')->with('msg', 'Xóa tag thành công!!');
        } else {
            return redirect()->route('admin.tags')->with('msg', 'Không tìm thấy tag để xóa!!');
        }
    }

    // public function showDeleteTagsTrash() {
    //     $tags = Tags::onlyTrashed()->get();

    //     return view('admin.tags.showdeletetagstrash', compact('tags'));
    // }

    // public function forceDeleteTags($id) {
    //     $tags = Tags::withTrashed()->find($id);
    //     $tags->forceDelete();

    //     return redirect()->back()->with('msg', 'Xóa vĩnh viễn dữ liệu thành công!!');
    // }

    // public function restoreTags($id) {
    //     $tags = Tags::withTrashed()->find($id);
    //     $tags->restore();

    //     return redirect()->back()->with('msg', 'Khôi phục thành công dữ liệu!!');
    // }
}
