<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
class StatusController extends Controller
{
    public function change(Request $request) {
        $table = $request->table;
        $status = $request->status;
        $id = $request->id;

        switch ($table) {
            case "post":
                $post = Post::find($id);
                $post->status = $status;
                $post->save();
                break;
            case "user":
                $user = User::find($id);
                $user->status = $status;
                $user->save();
                break;
        } 
        return json_encode([
            'status' => 'oke',
            'message' => 'Cập nhật trạng thái thành công!',
            'id' => $id,
        ],200);
    }
}
