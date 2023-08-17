<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Questions;
use App\Models\Admin\Professions;
use App\Http\Requests\Admin\QuestionsFormRequest;


class QuestionsController extends Controller
{
    public function index() {
        $questions = Questions::all();

        return view('admin.questions.showquestions', compact('questions'));
    }

    public function showAddQuestions() {
        $professions = Professions::where('status', '1')->get();

        return view('admin.questions.showaddquestions', compact('professions'));
    }

    public function addQuestions(QuestionsFormRequest $request) {
        $data = $request->validated();

        $questions = new Questions;
        $questions->content = $data['questions-content'];
        $questions->answer = $data['questions-answer'];
        $questions->profession_id = $data['profession_id'];
        $questions->status = $request->status == true ? '1' : '0';
        $questions->save();

        return redirect()->route('admin.questions')->with('msg', 'Thêm câu hỏi thành công!!');
    }

    public function showEditQuestions($id) {
        $questions = Questions::find($id);
        $professions = Professions::where('status', '1')->get();

        return view('admin.questions.showeditquestions', compact('questions', 'professions'));
    }

    public function updateQuestions(QuestionsFormRequest $request, $id) {
        $data = $request->validated();

        $questions = Questions::find($id);
        $questions->content = $data['questions-content'];
        $questions->answer = $data['questions-answer'];
        $questions->profession_id = $data['profession_id'];
        $questions->status = $request->status == true ? '1' : '0';
        $questions->update();

        return redirect()->route('admin.questions')->with('msg', 'Cập nhật câu hỏi thành công!!');
    }

    public function deleteQuestions(Request $request) {
        $questions = Questions::find($request->question_delete_id);
        if($questions) {
            $questions->delete();
            return redirect()->route('admin.questions')->with('msg', 'Xóa câu hỏi thành công!!');
        } else {
            return redirect()->route('admin.questions')->with('msg', 'Không tìm thấy câu hỏi để xóa!!');
        }
    }

    // public function showDeleteQuestionsTrash() {
    //     $questions = Questions::onlyTrashed()->get();

    //     return view('admin.questions.showdeletequestionstrash', compact('questions'));
    // }

    // public function forceDeleteQuestions($id) {
    //     $questions = Questions::withTrashed()->find($id);
    //     $questions->forceDelete();

    //     return redirect()->back()->with('msg', 'Xóa vĩnh viễn dữ liệu thành công!!');
    // }

    // public function restoreQuestions($id) {
    //     $questions = Questions::withTrashed()->find($id);
    //     $questions->restore();

    //     return redirect()->back()->with('msg', 'Khôi phục thành công dữ liệu!!');
    // }
}
