<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin\Page;
use App\Models\Admin\Admin;
use App\Models\Admin\Event;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Admin\EventCategory;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function index()
    {
        $events = Event::all()->count();
        $staff = User::where('user_type','app')->get()->count();
        $admin = Admin::all()->count();
        $event_categories = EventCategory::all()->count();
        $roles = Role::all()->count();
        $pages = Page::all()->count();
        return view('admin.dashboard',compact('events', 'staff', 'admin','event_categories', 'roles', 'pages'));
    }

}
