<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Topics;
use App\Models\Admin\Professions;
use App\Http\Requests\Admin\TopicsFormRequest;
use Illuminate\Support\Str;


class TopicsController extends Controller
{
    public function index() {
        $topics = Topics::all();

        return view('admin.topics.showtopics', compact('topics'));
    }

    public function showAddTopics() {
        $professions = Professions::where('status', '1')->get();

        return view('admin.topics.showaddtopics', compact('professions'));
    }

    public function addTopics(TopicsFormRequest $request) {
        $data = $request->validated();

        $topics = new Topics;
        $topics->name = $data['topics-name'];
        $topics->icon = $data['topics-icon'];
        $topics->description = $data['topics-description'];
        $topics->profession_id = $data['profession_id'];
        $topics->slug = Str::slug($data['slug']);
        $topics->status = $request->status == true ? '1' : '0';
        $topics->save();

        return redirect()->route('admin.topics')->with('msg', 'Thêm topics thành công!!');
    }

    public function showEditTopics($id) {
        $topics = Topics::find($id);
        $professions = Professions::where('status', '1')->get();

        return view('admin.topics.showedittopics', compact('topics', 'professions'));
    }

    public function updateTopics(TopicsFormRequest $request, $id) {
        $data = $request->validated();

        $topics = Topics::find($id);
        $topics->name = $data['topics-name'];
        $topics->icon = $data['topics-icon'];
        $topics->description = $data['topics-description'];
        $topics->profession_id = $data['profession_id'];
        $topics->slug = Str::slug($data['slug']);
        $topics->status = $request->status == true ? '1' : '0';
        $topics->update();

        return redirect()->route('admin.topics')->with('msg', 'Cập nhật topics thành công!!');
    }

    public function deleteTopics(Request $request) {
        $topics = Topics::find($request->topic_delete_id);
        if($topics) {
            $topics->forums->delete();
            $topics->delete();
            return redirect()->route('admin.topics')->with('msg', 'Xóa topics thành công!!');
        } else {
            return redirect()->route('admin.topics')->with('msg', 'Không tìm thấy topics để xóa!!');
        }
    }

    // public function showDeleteTopicsTrash() {
    //     $topics = Topics::onlyTrashed()->get();

    //     return view('admin.topics.showdeletetopicstrash', compact('topics'));
    // }

    // public function forceDeleteTopics($id) {
    //     $topics = Topics::withTrashed()->find($id);
    //     $topics->forceDelete();

    //     return redirect()->back()->with('msg', 'Xóa vĩnh viễn dữ liệu thành công!!');
    // }

    // public function restoreTopics($id) {
    //     $topics = Topics::withTrashed()->find($id);
    //     $topics->restore();

    //     return redirect()->back()->with('msg', 'Khôi phục thành công dữ liệu!!');
    // }
}
