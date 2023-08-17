<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Bookings;
use App\Models\Admin\Experts;
use App\Http\Requests\Admin\BookingsFormRequest;


class BookingsController extends Controller
{
    public function index() {
        $bookings = Bookings::all();
        return view('admin.bookings.showbookings', compact('bookings'));
    }

    public function showEditBookings($id) {
        $bookings = Bookings::find($id);
        $experts = Experts::where('type', '2')->get();

        return view('admin.bookings.showeditbookings', compact('bookings', 'experts'));
    }

    public function updateBookings(BookingsFormRequest $request, $id) {
        $data = $request->validated();

        $bookings = Bookings::find($id);
        $bookings->name = $data['bookings-name'];
        $bookings->phone = $data['bookings-phone'];
        $bookings->content = $data['bookings-content'];
        $bookings->expert_id = $data['expert_id'];
        $bookings->time= $data['bookings-time'];
        $bookings->date= $data['bookings-date'];
        $bookings->link= $data['bookings-link'];

        $bookings->update();

        return redirect()->route('admin.bookings')->with('msg', 'Cập nhật đặt hẹn thành công!!');
    }

    public function deleteBookings(Request $request) {
        $bookings = Bookings::find($request->booking_delete_id);
        if($bookings) {
            $bookings->delete();
            return redirect()->route('admin.bookings')->with('msg', 'Xóa đặt hẹn thành công!!');
        } else {
            return redirect()->route('admin.bookings')->with('msg', 'Không tìm thấy đặt hẹn để xóa!!');
        }
    }
}
