<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovePost;


use App\Jobs\SenMailJob;

class PostController extends Controller
{

    public function index() {
        $title = "Quản lý bài viết";
        $posts = Post::with('user','categories')->orderBy('created_at', 'desc')->get();
        return view('admin.pages.post.index', compact(
            'posts',
            'title'
        ));
    }

    public function my() {
        $title = "Bài viết của tôi";
        $posts = Post::where('user_id', Auth::user()->id)->get();
        return view('admin.pages.post.index', compact(
            'posts',
            'title'
        ));
    }


    public function create()
    {
        $title = 'Thêm bài viết';
        $categories = Category::all(); //lất tất cả danh mục
        return view("admin.pages.post.create", compact(
            "title",
            "categories"
        ));
    }

    public function store(Request $request) { 
        $request->validate([
            "name"=> "required|unique:posts",
            'category_id'=>'required'
        ],[
            'name.required' => 'Trường tên bài viết không được để trống',
            'name:unique' => 'Tên bài viết đã tồn tại',
            'category_id.required' => 'Chưa chọn danh mục bài viết'
        ]);

        $post = new Post;
        $post->name = $request->name;
        $post->slug = Str::slug($request->name);
        $post->short_content = $request->short_content;
        $post->content = $request->content;
        $post->thumbnail = $request->thumbnail;
        $post->status = 'pending';
        if($request->rank == null) {
            $post->rank = 0;
        } else {
            $post->rank = $request->rank;
        }
        $post->user_id = Auth::user()->id;
        $post->meta_title = $request->meta_title;
        $post->meta_keyword = $request->meta_keyword;
        $post->meta_description = $request->meta_description;
        $post->save();

        // foreach ($request->category_id as $category) { 
            $post->categories()->attach($request->category_id);
        // }

        toastr()->success('Thêm bài viết thành công');
        return to_route('admin.post');
        // to_route('admin.post') <=> redirect()->route('admin.post')
        // return $post;
    }

    public function edit($id) {
        $title = "Chỉnh sửa bài viết";
        $data = Post::find($id);
        
        $categories = Category::all();
        return view('admin.pages.post.edit', compact(
            'data', 
            'categories'
        ));
    }

    public function update(Request $request, $id) {
        // dd($request->all());
        $request->validate([
            'name' => 'required|unique:posts,name,'. $id,
            'category_id'=>'required'
        ],[
            'name.required' => 'Trường tên bài viết không được để trống',
            'name:unique' => 'Tên bài viết đã tồn tại',
            'category_id.required' => 'Chưa chọn danh mục bài viết'
        ]);
        // cập nhật bài viết
        $post = Post::find($id);
        $post->name = $request->name;
        $post->slug = Str::slug($request->name);
        $post->short_content = $request->short_content;
        $post->content = $request->content;
        $post->thumbnail = $request->thumbnail;
        $post->status = 'pending';
        if($request->has('rank')) {
            $post->rank = $request->rank;
        } else {
            $post->rank = 0;
        }
        $post->meta_title = $request->meta_title;
        $post->meta_keyword = $request->meta_keyword;
        $post->meta_description = $request->meta_description;
        $post->save();

        $post->categories()->sync($request->category_id); //

        toastr()->success('Sửa bài viết thành công');
        return to_route('admin.post');

    }

    public function delete($id) {
        $post = Post::find($id);
        $post->categories()->detach();
        $post->delete();

        toastr()->success('Xóa bài viết thành công!');
        return back();

        //thông báo 
        //return
    }


    //QUẢN LÝ TRẠNG THÁI BÀI VIẾT
    public function indexApprove() {
        $title = 'Duyệt bài viết';
        $posts = Post::where('status', 'pending')->get();
        return view('admin.pages.post.approve.index', compact(
            'title',
            'posts'
        ));
    }

    public function viewApprove($slug) {
        $title = 'Xem bài viết';
        $post = Post::where('slug', $slug)->first();

        return view('admin.pages.post.approve.view', compact(
            'title',
            'post'
        ));
    }

    public function publicPost($id) {
        $post = Post::find($id);
        $post->status = 'public';
        $post->save();

        $emailAuthor = $post->user->email;
        $namePosst = $post->name;

        $data = [
            'email' => $emailAuthor,
            'post' => $post,
            'content' => 'Đã được phê duyệt'
        ];
        SenMailJob::dispatch($data);
        // Mail::to($emailAuthor)->send(new ApprovePost($post, 'Đã được phê duyệt'));
        toastr()->success('Duyệt bài viết thành công!');
        return to_route('admin.approve-post');

    }

    public function rejectPost($id , Request $request) {
        $post = Post::find($id);
        $post->status = 'reject';
        $post->save();

        $emailAuthor = $post->user->email;
        $namePosst = $post->name;

        $data = [
            'email' => $emailAuthor,
            'post' => $post,
            'content' => 'Đã bị từ chối đăng',
            'note' => $request->note
        ];
        SenMailJob::dispatch($data);
        // Mail::to($emailAuthor)->send(new ApprovePost($post, 'Đã bị từ chối đăng', $request->note));
        toastr()->success('Từ chối bài viết thành công!');
        return to_route('admin.approve-post');
    }


}
