<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Tagprograms;
use App\Models\Admin\Tags;
use App\Models\Admin\Featureprograms;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\TagprogramsFormRequest;

class TagprogramsController extends Controller
{
    public function index() {
        $tagprograms = Tagprograms::all();

        return view('admin.tagprograms.showtagprograms', compact('tagprograms'));
    }

    public function showAddTagprograms() {
        $tags = Tags::where('status', '1')->get();
        $programs = Featureprograms::where('status', '1')->get();

        return view('admin.tagprograms.showaddtagprograms', compact('tags', 'programs'));
    }

    public function addTagprograms(TagprogramsFormRequest $request) {
        $data = $request->validated();

        $tagprograms = new Tagprograms;
        $tagprograms->tag_id = $data['tag_id'];
        $tagprograms->program_id = $data['program_id'];
        $tagprograms->save();

        return redirect()->route('admin.tag-program')->with('msg', 'Thêm thẻ của chương trình thành công!!');
    }

    public function showEditTagprograms($id) {
        $tags = Tags::where('status', '1')->get();
        $programs = Featureprograms::where('status', '1')->get();
        $tagprograms = Tagprograms::find($id);

        return view('admin.tagprograms.showedittagprograms', compact('tags', 'programs', 'tagprograms'));
    }

    public function updateTagprograms(TagprogramsFormRequest $request, $id) {
        $data = $request->validated();

        $tagprograms = Tagprograms::find($id);
        $tagprograms->tag_id = $data['tag_id'];
        $tagprograms->program_id = $data['program_id'];
        $tagprograms->update();

        return redirect()->route('admin.tag-program')->with('msg', 'Cập nhật thẻ của chương trình thành công!!');
    }

    public function deleteTagprograms(Request $request) {
        $tagprograms = Tagprograms::find($request->tagprogram_delete_id);
        if($tagprograms) {
            $tagprograms->delete();
            return redirect()->route('admin.tag-program')->with('msg', 'Xóa thẻ của chương trình thành công!!');
        } else {
            return redirect()->route('admin.tag-program')->with('msg', 'Không tìm thấy thẻ của chương trình để xóa!!');
        }
    }
}
