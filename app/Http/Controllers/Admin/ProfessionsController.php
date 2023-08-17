<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Professions;
use App\Http\Requests\Admin\ProfessionsFormRequest;

class ProfessionsController extends Controller
{
    public function index() {
        $professions = Professions::all();
        return view('admin.professions.showprofessions', compact('professions'));
    }

    public function showAddProfessions() {
        return view('admin.professions.showaddprofessions');
    }

    public function addProfessions(ProfessionsFormRequest $request) {
        $data = $request->validated();

        $professions = new Professions;
        $professions->name = $data['professions-name'];
        $professions->status = $request->status == true ? '1' : '0';
        $professions->save();

        return redirect()->route('admin.professions')->with('msg', 'Thêm chuyên ngành thành công!!');
    }

    public function showEditProfessions($id) {
        $professions = Professions::find($id);
        return view('admin.professions.showeditprofessions', compact('professions'));
    }

    public function updateProfessions(ProfessionsFormRequest $request, $id) {
        $data = $request->validated();
        
        $professions = Professions::find($id);
        $professions->name = $data['professions-name'];
        $professions->status = $request->status == true ? '1' : '0';
        $professions->update();

        return redirect()->route('admin.professions')->with('msg', 'Cập nhật chuyên ngành thành công!!');
    }

    public function deleteProfessions(Request $request) {
        $professions = Professions::find($request->professions_delete_id);
        if($professions) {
            $professions->topics()->delete();
            $professions->blogs()->delete();
            $professions->contacts()->delete();
            $professions->programs()->delete();
            $professions->questions()->delete();
            $professions->delete();
            return redirect()->route('admin.professions')->with('msg', 'Xóa chuyên ngành thành công!!');
        } else {
            return redirect()->route('admin.professions')->with('msg', 'Không tìm thấy chuyên ngành để xóa!!');
        }
    }

    // public function showDeleteProfessionsTrash() {
    //     $professions = Professions::onlyTrashed()->get();

    //     return view('admin.professions.showdeleteprofessionstrash', compact('professions'));
    // }

    // public function forceDeleteProfessions($id) {
    //     $professions = Professions::withTrashed()->find($id);
    //     $professions->forceDelete();

    //     return redirect()->back()->with('msg', 'Xóa vĩnh viễn dữ liệu thành công!!');
    // }

    // public function restoreProfessions($id) {
    //     $professions = Professions::withTrashed()->find($id);
    //     $professions->restore();

    //     return redirect()->back()->with('msg', 'Khôi phục thành công dữ liệu!!');
    // }
}
