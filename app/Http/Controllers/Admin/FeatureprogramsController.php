<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Featureprograms;
use App\Models\Admin\Professions;
use App\Http\Requests\Admin\FeatureprogramsFormRequest;
use Illuminate\Support\Str;


class FeatureprogramsController extends Controller
{
    public function index() {
        $features = Featureprograms::all();

        return view('admin.featureprograms.showfeatureprograms', compact('features'));
    }

    public function showAddFeatureprograms() {
        $professions = Professions::where('status', '1')->get();

        return view('admin.featureprograms.showaddfeatureprograms', compact('professions'));
    }

    public function addFeatureprograms(FeatureprogramsFormRequest $request) {
        $data = $request->validated();

        $features = new Featureprograms;
        $features->name = $data['featureprograms-name'];
        $features->description = $data['featureprograms-description'];
        $features->content = $data['featureprograms-content'];
        $features->slug = Str::slug($data['featureprograms-slug']);
        $features->profession_id = $data['profession_id'];
        $features->status = $request->is_highlight == true ? '1' : '0';
        $features->is_highlight = $request->status == true ? '1' : '0';

        $features->save();

        return redirect()->route('admin.featureprograms')->with('msg', 'Thêm chương trình thành công!!');
    }

    public function showEditFeatureprograms($id) {
        $features = Featureprograms::find($id);
        $professions = Professions::where('status', '1')->get();

        return view('admin.featureprograms.showeditfeatureprograms', compact('features', 'professions'));
    }

    public function updateFeatureprograms(FeatureprogramsFormRequest $request, $id) {
        $data = $request->validated();

        $features = Featureprograms::find($id);
        $features->name = $data['featureprograms-name'];
        $features->description = $data['featureprograms-description'];
        $features->content = $data['featureprograms-content'];
        $features->slug = Str::slug($data['featureprograms-slug']);
        $features->profession_id = $data['profession_id'];
        $features->status = $request->is_highlight == true ? '1' : '0';
        $features->is_highlight = $request->status == true ? '1' : '0';

        $features->update();

        return redirect()->route('admin.featureprograms')->with('msg', 'Cập nhật chương trình thành công!!');
    }

    public function deleteFeatureprograms(Request $request) {
        $features = Featureprograms::find($request->features_delete_id);
        if($features) {
            // $features->tags()->delete();
            $features->tagprograms()->delete();
            $features->delete();
            return redirect()->route('admin.featureprograms')->with('msg', 'Xóa chương trình thành công!!');
        } else {
            return redirect()->route('admin.featureprograms')->with('msg', 'Không tìm thấy chương trình để xóa!!');
        }
    }

    // public function showDeleteFeatureprogramsTrash() {
    //     $features = Featureprograms::onlyTrashed()->get();

    //     return view('admin.featureprograms.showdeletefeatureprogramstrash', compact('features'));
    // }

    // public function forceDeleteFeatureprograms($id) {
    //     $features = Featureprograms::withTrashed()->find($id);
    //     $features->forceDelete();

    //     return redirect()->back()->with('msg', 'Xóa vĩnh viễn dữ liệu thành công!!');
    // }

    // public function restoreFeatureprograms($id) {
    //     $features = Featureprograms::withTrashed()->find($id);
    //     $features->restore();

    //     return redirect()->back()->with('msg', 'Khôi phục thành công dữ liệu!!');
    // }
}
