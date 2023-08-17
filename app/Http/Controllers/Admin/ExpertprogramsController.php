<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ExpertPrograms;
use App\Models\Admin\Experts;
use App\Models\Admin\FeaturePrograms;
use App\Http\Requests\Admin\ExpertprogramsFormRequest;



class ExpertprogramsController extends Controller
{
    public function index() {
        $expro = ExpertPrograms::all();
        return view('admin.expertprograms.showexpro', compact('expro'));
    }

    public function showAddExpertprograms() {
        $features = FeaturePrograms::where('status', '1')->get();
        $experts = Experts::where('type','2')->get();
        
        return view('admin.expertprograms.showaddexpro', compact('features', 'experts'));
    }

    public function addExpertprograms(ExpertprogramsFormRequest $request) {
        $data = $request->validated();

        $expro = new ExpertPrograms;
        $expro->expert_id = $data['expert_id'];
        $expro->program_id = $data['program_id'];
        $expro->save();

        return redirect()->route('admin.expert-program')->with('msg', 'Thêm chuyên gia và chương trình thành công!!');
    }

    public function showEditExpertprograms($id) {
        $features = FeaturePrograms::where('status', '1')->get();
        $experts = Experts::where('type','2')->get();

        $expro = ExpertPrograms::find($id);
        return view('admin.expertprograms.showeditexpertprograms', compact('expro', 'experts', 'features'));
    }

    public function updateExpertprograms(ExpertprogramsFormRequest $request, $id) {
        $data = $request->validated();

        $expro = ExpertPrograms::find($id);
        $expro->expert_id = $data['expert_id'];
        $expro->program_id = $data['program_id'];
        $expro->update();

        return redirect()->route('admin.expert-program')->with('msg', 'Cập nhật chuyên gia và chương trình thành công!!');
    }

    public function deleteExpertprograms(Request $request) {
        $expro = ExpertPrograms::find($request-> expro_delete_id);
        if($expro) {
            $expro->delete();
            return redirect()->route('admin.expert-program')->with('msg', 'Xóa chuyên gia của chương trình thành công!!');
        } else {
            return redirect()->route('admin.expert-program')->with('msg', 'Không tìm thấy chuyên gia của chương trình để xóa!!');
        }
    }
}

