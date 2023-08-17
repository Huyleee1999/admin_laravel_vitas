<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Contacts;
use App\Models\Admin\Professions;


class ContactsController extends Controller
{
    public function index() {
        $contacts = Contacts::all();
        return view('admin.contacts.showcontacts', compact('contacts'));
    }

    public function deleteContacts(Request $request) {
        $contacts = Contacts::find($request->question_delete_id);
        if($contacts) {
            $contacts->delete();
            return redirect()->route('admin.contacts')->with('msg', 'Xóa liên hệ thành công!!');
        } else {
            return redirect()->route('admin.contacts')->with('msg', 'Không tìm thấy liên hệ để xóa!!');
        }
    }
}
