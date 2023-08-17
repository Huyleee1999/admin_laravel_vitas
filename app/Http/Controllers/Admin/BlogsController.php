<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Blogs;
use App\Models\Admin\Experts;
use App\Models\Admin\Professions;
use App\Http\Requests\Admin\BlogsFormRequest;
use Illuminate\Support\Str;


class BlogsController extends Controller
{
    public function index() {
        $blogs = Blogs::all();
        return view('admin.blogs.showblogs', compact('blogs'));
    }

    public function showAddBlogs() {
        $professions = Professions::where('status', '1')->get();

        $experts = Experts::where('type', '2')->get();
        return view('admin.blogs.showaddblogs', compact('experts','professions'));
    }

    public function addBlogs(BlogsFormRequest $request) {
        $data = $request->validated();

        $blogs = new Blogs();
        $blogs->name = $data['blog-name'];
        $blogs->description = $data['blog-description'];
        $blogs->content = $data['blog-content'];
        $blogs->slug = Str::slug($data['slug']);
        $blogs->profession_id = $data['profession_id'];
        $blogs->expert_id = $data['expert_id'];
        $blogs->type = $request->type == true ? '1' : '2';
        $blogs->is_highlight = $request->is_highlight == true ? '1' : '0';
        $blogs->status = $request->status == true ? '1' : '0';
        $blogs->save();

        return redirect()->route('admin.blogs')->with('msg', 'Thêm blog thành công!!');
    }

    public function showEditBlogs($id) {
        $professions = Professions::where('status', '1')->get();
        $experts = Experts::where('type', '2')->get();
        $blogs = Blogs::find($id);

        return view('admin.blogs.showeditblogs', compact('experts', 'blogs', 'professions'));
    }

    public function updateBlogs(BlogsFormRequest $request, $id) {
        $data = $request->validated();

        $blogs = Blogs::find($id);
        $blogs->name = $data['blog-name'];
        $blogs->description = $data['blog-description'];
        $blogs->content = $data['blog-content'];
        $blogs->slug = Str::slug($data['slug']);
        $blogs->profession_id = $data['profession_id'];
        $blogs->expert_id = $data['expert_id'];
        $blogs->type = $request->type == true ? '1' : '2';
        $blogs->is_highlight = $request->is_highlight == true ? '1' : '0';
        $blogs->status = $request->status == true ? '1' : '0';
        $blogs->update();

        return redirect()->route('admin.blogs')->with('msg', 'Cập nhật blog thành công!!');
    }

    public function deleteBlogs(Request $request) {
        $blogs = Blogs::find($request->blog_delete_id);
        if($blogs) {
            $blogs->delete();
            return redirect()->route('admin.blogs')->with('msg', 'Xóa blog thành công!!');
        } else {
            return redirect()->route('admin.blogs')->with('msg', 'Không tìm thấy blog để xóa!!');
        }
    }   
}
