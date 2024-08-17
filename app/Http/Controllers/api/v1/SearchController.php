<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
class SearchController extends Controller
{
    public function search() {
        $keyword = $_GET['q'] ? $_GET['q'] : '';
        $posts = Post::where('name', 'LIKE' , "%$keyword%")->where('status','public')->get();
        return response()->json([
            'data' => [
                'status' => 'success',
                'keyword'=> $keyword,
                'quantity_post' => $posts->count(),
                'posts' => $posts
            ]
        ], 200);
    }
}
