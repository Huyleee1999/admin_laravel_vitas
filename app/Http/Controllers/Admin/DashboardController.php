<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Users;
use App\Models\Admin\Comments;
use App\Models\Admin\Bookings;
use App\Models\Admin\Evaluates;


class DashboardController extends Controller
{
    public function index() {
        $users = Users::where('type', '1')->count();
        $comments = Comments::count();
        $bookings = Bookings::count();
        $evaluates = Evaluates::count();

        return view('admin.dashboard.showdashboard', compact('users', 'comments', 'bookings', 'evaluates'));
    }
}
