<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Banner;
use App\Http\Requests\Admin\BannersFormRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class BannersController extends Controller
{
    public function index() {
        $banners = Banner::all();
        return view('admin.banners.showbanners', compact('banners'));
    }

    public function showAddBanners() {
        return view('admin.banners.showaddbanners');
    }

    public function addBanners(BannersFormRequest $request) {
        $data = $request->validated();

        $banners = new Banner;
        $banners->title = $data['banner-title'];
        $banners->description = $data['banner-description'];
        $banners->slug = Str::slug($data['banner-slug']);
        // if($request->hasFile('banner-image')) {
        //     $file = $request->file('banner-image');
        //     $filename = time().'.'.$file->getClientOriginalExtension();
        //     $file->move('uploads/banners/', $filename);
        //     $banners->image = $filename;
        // }
        $banners->type = $request->type == true ? '1' : '2';
        $banners->status = $request->status == true ? '1' : '0';
        $banners->save();

        return redirect()->route('admin.banners')->with('msg', 'Thêm banner thành công!!');
    }

    public function showEditBanners($id) {
        $banners = Banner::find($id);
        return view('admin.banners.showeditbanners', compact('banners'));
    }

    public function update(BannersFormRequest $request, $id) {
        $data = $request->validated();

        $banners = Banner::find($id);
        $banners->title = $data['banner-title'];
        $banners->description = $data['banner-description'];
        $banners->slug = Str::slug($data['banner-slug']);
        // if($request->hasFile('banner-image')) {

        //     $destination = 'uploads/banners/'.$banners->image;
        //     if(File::exists($destination)) {
        //         File::delete($destination);
        //     }

        //     $file = $request->file('banner-image');
        //     $filename = time().'.'.$file->getClientOriginalExtension();
        //     $file->move('uploads/banners/', $filename);
        //     $banners->image = $filename;
        // }
        $banners->type = $request->type == true ? '1' : '2';
        $banners->status = $request->status == true ? '1' : '0';
        $banners->update();

        return redirect()->route('admin.banners')->with('msg', 'Update banner thành công!!');
    }   

    public function delete(Request $request) {
        $banners = Banner::find($request->banner_delete_id);
        if($banners) {
            $banners->delete();
            return redirect()->route('admin.banners')->with('msg', 'Xóa banner thành công!!');
        } else {
            return redirect()->route('admin.banners')->with('msg', 'Không tìm thấy banner để xóa!!');
        }
    }

    // public function delete($id) {
    //     $banners = Banner::find($id);
    //     if($banners) {
    //         $banners->delete();
    //         return redirect()->route('admin.banners')->with('msg', 'Xóa banner thành công!!');
    //     } else {
    //         return redirect()->route('admin.banners')->with('msg', 'Không tìm thấy banner để xóa!!');
    //     }
    // }

    // public function showDeleteBannersTrash() {
    //     $banners = Banner::onlyTrashed()->get();

    //     return view('admin.banners.showdeletebannerstrash', compact('banners'));
    // }

    // public function forceDeleteBanners($id) {
    //     $banners = Banner::withTrashed()->find($id);
    //     $banners->forceDelete();

    //     return redirect()->back()->with('msg', 'Xóa vĩnh viễn dữ liệu thành công!!');
    // }

    // public function restoreBanners($id) {
    //     $banners = Banner::withTrashed()->find($id);
    //     $banners->restore();

    //     return redirect()->back()->with('msg', 'Khôi phục thành công dữ liệu!!');
    // }
}
