<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
class SearchController extends Controller
{
    public function search() {
        $keyword = $_GET['q'] ? $_GET['q'] : '';
        $posts = Post::where('name', 'LIKE' , "%$keyword%")->where('status','public')->get();
        $categories = Category::where('name', 'LIKE' , "%$keyword%")->get();
        return response()->json([
            'data' => [
                'status' => 'success',
                'keyword'=> $keyword,
                'posts' => [
                    'quantity' => $posts->count(),
                    'items' => $posts
                ],
                'category' => [
                    'quantity' => $categories->count(),
                    'items' => $categories
                ]
            ]
        ], 200);
    }
}
