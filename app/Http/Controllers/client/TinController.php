<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class TinController extends Controller
{
    function trangchu() 
    {
        $tinmoinhat = Post::with('user', 'categories')
            ->where('status', 'public')
            ->orderByDesc('created_at')
            ->limit(6)->get();
        $tinxemnhieu = Post::with('user', 'categories')
            ->where('status', 'public')
            ->orderByDesc('views')
            ->limit(6)->get();
        $categories = Category::with('posts')->get();
        $tinnoibat = Post::with('user', 'categories')
            ->where('status', 'public')
            ->where('rank', 1)
            ->orderByDesc('created_at')
            ->get();
        return view('client.pages.trangChu.index', compact(
            'tinmoinhat',
            'tinxemnhieu',
            'categories',
            'tinnoibat'
        ));
    }

    function tinmoi() {
        $title = 'Tin mới nhất';
        $meta_description = 'Tin mới nhất';
        $meta_keyword = 'Tin mới nhất, mới nhất, ....';
        $categories = Category::with('posts')->get();
        $data = Post::with('user', 'categories')
            ->where('status', 'public')
            ->orderByDesc('created_at')
            ->paginate(3);
        return view('client.pages.tin.index',compact(
            'title',
            'data',
            'categories',
            'meta_description',
            'meta_keyword'
        ));
    }

    function tinxemnhieu() {
        $title = 'Tin xem nhiều';
        $meta_description = 'Tin xem nhiều';
        $meta_keyword = 'Tin xem nhiều, xem nhiều, ....';
        $categories = Category::with('posts')->get();

        $data = Post::with('user', 'categories')
            ->where('status', 'public')
            ->orderByDesc('views')
            ->paginate(3);
        return view('client.pages.tin.index',compact(
            'title',
            'data',
            'categories',
            'meta_description',
            'meta_keyword'
        ));
    }

    function tinchitiet($slug) {
        $post = Post::where('slug', $slug)->where('status', 'public')->first();
        $post->increment('views');
        $categories = Category::with('posts')->get();
        // dd($categories);
        if ($post == NULL) {
            toastr()->error('Bài viết không tồn tại, hoặc không công khai');
            return back();
        }
        $id_danhmuc = $post->categories()->first()->id;
        $tinlienquan = Category::with('posts')->find($id_danhmuc);
        return view('client.pages.chiTietTin.index', compact(
            'post',
            'tinlienquan',
            'categories'
        ));
    }

    function loaitin($slug) //GET['/loai-tin/abc.html']
    {
        $category = Category::with('posts')->where('slug', $slug)->first();
        $posts = $category->posts()->where('status', 'public')->paginate(3);
        $categories = Category::with('posts')->get();
        if ($category == NULL) {
            return abort(403, 'Loại tin không tồn tại');
        }
        return view('client.pages.loaiTin.index', compact(
            'category',
            'categories',
            'posts'
        ));
    }


    function timkiem()  //GET['/tim-kiem']
    {
        if (isset($_GET['q']) && $_GET['q'] != "") {
            $q = $_GET['q'];
            $posts = Post::with('user', 'categories')
                ->where('name', 'LIKE', "%$q%")
                ->where('status', 'public')
                ->get();
            return view('client.pages.timKiem.index', compact(
                'posts'
            ));
        }

        $posts = NULL;
        return view('client.pages.timKiem.index',compact(
            'posts'
        ));
    }
}
