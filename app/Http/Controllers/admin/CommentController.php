<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'content' => 'required'
        ], [
            'content.required' => 'Bình luận không được để trống!'
        ]);
        $comment = new Comment;
        $comment->post_id = $request->post_id;
        $comment->user_id = $request->user_id;
        if($request->has('parent_id')) {
            $comment->parent_id = $request->parent_id;
        }
        $comment->content = $request->content;
        $comment->save();
        toastr()->success('Thêm bình luận thành công!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
            $request->validate([
                'content' => 'required',
            ], [
                'content.required' => 'Bình luận không được để trống!'
            ]);

            $comment = Comment::find($request->id);
            $comment->content = $request->content;
            $comment->save();

        toastr()->success('Sửa binh luận thành công!');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        Comment::find($id)->delete();
        toastr()->success('Xóa bình luận thành công');
        return back();
    }
}
