<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{
    public function index() { //GET [/admin/dashboard]
        $title = 'Dashboard';
        $user = User::count();

        $post = Post::all();
        $total_views = 0;
        foreach ($post as $p) {
            $total_views += $p->views;
        }

        $post_count = Post::count();
        $category = Category::count();

        return view("admin.pages.dashboard.index", compact(
            'title',
            'user',
            'post_count',
            'total_views'
        ));
    }
}
