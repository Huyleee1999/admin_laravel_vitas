<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Experts;
use App\Http\Requests\Admin\ExpertsFormRequest;
use Illuminate\Support\Str;


class ExpertsController extends Controller
{
    public function index() {
        $experts = Experts::where('type', '2')->get();

        return view('admin.experts.showexperts', compact('experts'));
    }

    public function showAddExperts() {
        return view('admin.experts.showaddexperts');
    }

    public function addExperts(ExpertsFormRequest $request) {
        $data = $request->validated();

        $experts = new Experts;
        $experts->name = $data['experts-name'];
        $experts->phone = $data['experts-phone'];
        $experts->email = $data['experts-email'];
        $experts->company = $data['experts-company'];
        $experts->description = $data['experts-description'];
        $experts->price = $data['experts-price'];
        $experts->content = $data['experts-content'];
        $experts->experience = $data['experts-experience'];
        $experts->position = $data['experts-position'];
        $experts->certificate = $data['experts-certificate'];
        $experts->project = $data['experts-project'];  
        $experts->slug = Str::slug($data['slug']);
        $experts->is_highlight = $request->is_highlight == true ? '1' : '0';
        $experts->status = $request->status == true ? '1' : '0';

        $experts->save();

        return redirect()->route('admin.experts')->with('msg', 'Thêm chuyên gia thành công!!');
    }

    public function showEditExperts($id) {
        $experts = Experts::find($id);

        return view('admin.experts.showeditexperts', compact('experts'));
    }

    public function updateExperts(ExpertsFormRequest $request, $id) {
        $data = $request->validated();

        $experts = Experts::find($id);
        $experts->name = $data['experts-name'];
        $experts->phone = $data['experts-phone'];
        $experts->email = $data['experts-email'];
        $experts->company = $data['experts-company'];
        $experts->description = $data['experts-description'];
        $experts->price = $data['experts-price'];
        $experts->content = $data['experts-content'];
        $experts->experience = $data['experts-experience'];
        $experts->position = $data['experts-position'];
        $experts->certificate = $data['experts-certificate'];
        $experts->project = $data['experts-project'];  
        $experts->is_highlight = $request->is_highlight == true ? '1' : '0';
        $experts->status = $request->status == true ? '1' : '0';

        $experts->update();

        return redirect()->route('admin.experts')->with('msg', 'Cập nhật chuyên gia thành công!!');
    }

    public function deleteExperts(Request $request) {
        $experts = Experts::find($request->expert_delete_id);
        if($experts) {
            $experts->blogs()->delete();
            $experts->evaluates()->delete();
            $experts->delete();
            return redirect()->route('admin.experts')->with('msg', 'Xóa chuyên gia thành công!!');
        } else {
            return redirect()->route('admin.experts')->with('msg', 'Không tìm thấy chuyên gia để xóa!!');
        }
    }

    // public function showDeleteExpertsTrash() {
    //     $experts = Experts::onlyTrashed()->get();

    //     return view('admin.experts.showdeleteexpertstrash', compact('experts'));
    // }

    // public function forceDeleteExperts($id) {
    //     $experts = Experts::withTrashed()->find($id);
    //     $experts->forceDelete();

    //     return redirect()->back()->with('msg', 'Xóa vĩnh viễn dữ liệu thành công!!');
    // }

    // public function restoreExperts($id) {
    //     $experts = Experts::withTrashed()->find($id);
    //     $experts->restore();

    //     return redirect()->back()->with('msg', 'Khôi phục thành công dữ liệu!!');
    // }
}
