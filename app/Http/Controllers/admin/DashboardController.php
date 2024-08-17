<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() { //GET [/admin/dashboard]
        $title = 'Dashboard';
        return view("admin.pages.dashboard.index", compact(
            'title'
        )); //render ra giao diện
    }
}
