<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Support\Str;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $title = 'QL danh mục';
        $categories = Category::all(); //Lấy tất cả danh mục
        return view('admin.pages.category.index', compact(  //render giao diện , truyền data xuống giao diện
            'categories',
            'title',
        ));
    }

    public function create()
    {
        $title = 'Thêm mới danh mục';
        $categories = Category::all();
        return view('admin.pages.category.create', compact(
            'title',
            'categories'
        ));
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'meta_keyword' => $request->meta_keyword,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'parent_id' => $request->parent_id,
        ]);

        toastr()->success('Thêm danh mục mới thành công');
        return redirect()->route('admin.category');
    }

    public function edit($id)
    {
        $title = 'Chỉnh sửa danh mục';
        $data = Category::find($id);
        $categories = Category::all(); //Lấy tất cả danh mục
        return view('admin.pages.category.edit', compact(
            'data',
            'title',
            'categories'
        ));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
        ], [
            'name.required' => 'Trường tên danh mục không được bỏ trống',
            'name.unique' => 'Tên danh mục đã được sữ dụng'
        ]);

        $data = Category::find($id);
        $data->name = $request->name;
        $data->slug = Str::slug($request->name, '-');
        $data->meta_title = $request->meta_title;
        $data->meta_keyword = $request->meta_keyword;
        $data->meta_description = $request->meta_description;
        $data->parent_id = $request->parent_id;
        $data->save();
        toastr()->success('Cập nhật danh mục thành công');
        return to_route('admin.category');
    }

    function delete($id)
    {
        $category = Category::find($id);
        if($category->posts->count() > 0) {
            toastr()->error('Danh mục này đang chứa bài viết');
            return redirect()->back();
        }
        $category->delete();
        toastr()->success('Xóa thành công');
        return redirect()->back();
    }
}
