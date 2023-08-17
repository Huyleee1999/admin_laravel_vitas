<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Users;
use App\Models\Admin\Experts;
use App\Models\Admin\Evaluates;
use App\Http\Requests\Admin\EvaluatesFormRequest;


class EvaluatesController extends Controller
{
    public function index() {
        $evaluates = Evaluates::all();
        
        return view('admin.evaluates.showevaluates', compact('evaluates'));
    }

    public function showEditEvaluates($id) {
        $users = Users::where('type', '1')->get();
        $experts = Experts::where('type', '2')->get();

        $evaluates = Evaluates::find($id);

        return view('admin.evaluates.showeditevaluates', compact('experts', 'users', 'evaluates'));
    }

    public function updateEvaluates(EvaluatesFormRequest $request, $id) {
        $data = $request->validated();

        $evaluates = Evaluates::find($id);
        $evaluates->rate = $data['evaluates-rate'];
        $evaluates->content = $data['evaluates-content'];
        $evaluates->expert_id = $data['expert_id'];
        $evaluates->user_id = $data['user_id'];
        $evaluates->status = $request->status == true ? '1' : '0';

        $evaluates->update();

        return redirect()->route('admin.evaluates')->with('msg', 'Cập nhật đánh giá thành công!!');
    }

    public function deleteEvaluates(Request $request) {
        $evaluates = Evaluates::find($request->evaluate_delete_id);
        if($evaluates) {
            $evaluates->delete();
            return redirect()->route('admin.evaluates')->with('msg', 'Xóa đánh giá thành công!!');
        } else {
            return redirect()->route('admin.evaluates')->with('msg', 'Không tìm thấy đánh giá để xóa!!');
        }
    }
}
