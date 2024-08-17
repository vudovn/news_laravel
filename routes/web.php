<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// admin
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CommentController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\RoleController;

// client
use App\Http\Controllers\client\TinController;

// Route::get('/', function () {
//     return view('welcome');
// });

// // auth admin
Route::get('/admin', [DashboardController::class, 'index'])
    ->name('admin.login.index')->middleware('AuthVip');
Route::get('/admin/login', [LoginController::class, 'index'])
    ->name('admin.login.index')->middleware('checkLoginAdmin');
Route::post('/admin/doLogin', [LoginController::class, 'doLogin'])->name('admin.login.doLogin');
Route::get('/admin/doLogout', [LoginController::class, 'doLogout'])->name('admin.doLogout');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard')->middleware('AuthVip');

// QL user
Route::prefix('/admin/user')->middleware('AuthVip')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('admin.user'); // URL = /admin/user
    Route::get('/create', [UserController::class, 'create'])->name('admin.user.create')->middleware('Permission:create user'); // URL = /admin/user/create
    Route::post('/store', [UserController::class, 'store'])->name('admin.user.store')->middleware('Permission:create user'); // URL = /admin/user/store
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit')->middleware('Permission:edit user'); // URL = /admin/user/get
    Route::post('/update/{id}', [UserController::class, 'update'])->name('admin.user.update')->middleware('Permission:edit user');
    Route::get('/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete')->middleware('Permission:delete user'); // URL = /admin/user/delete/{id}
    Route::get('/status/{id}/{status}', [UserController::class, 'status'])->name('admin.user.status');
});

// QL danh mục
Route::prefix('/admin/category')->middleware('AuthVip')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('admin.category')->middleware('Permission:view category');
    Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create')->middleware('Permission:create category');
    Route::post('/store', [CategoryController::class, 'store'])->name('admin.category.store')->middleware('Permission:create category');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit')->middleware('Permission:edit category');
    Route::post('/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update')->middleware('Permission:edit category');
    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete')->middleware('Permission:delete category');
});

// QL bài viết
Route::prefix('/admin/post')->middleware('AuthVip')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('admin.post')->middleware('Permission:view post');
    Route::get('/my', [PostController::class, 'my'])->name('admin.post.my')->middleware('Permission:view post');
    Route::get('/create', [PostController::class, 'create'])->name('admin.post.create')->middleware('Permission:create post');
    Route::post('/store', [PostController::class, 'store'])->name('admin.post.store')->middleware('Permission:create post');
    Route::get('/edit/{id}', [PostController::class, 'edit'])->name('admin.post.edit')->middleware('Permission:edit post');
    Route::post('/update/{id}', [PostController::class, 'update'])->name('admin.post.update')->middleware('Permission:edit post');
    Route::get('/delete/{id}', [PostController::class, 'delete'])->name('admin.post.delete')->middleware('Permission:delete post');
});

// QL quyền
Route::prefix('/admin/role')->middleware('AuthVip')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('admin.role')->middleware('Permission:view role');
    Route::get('/create', [RoleController::class, 'create'])->name('admin.role.create')->middleware('Permission:create role');
    Route::post('/store', [RoleController::class, 'store'])->name('admin.role.store')->middleware('Permission:create role');
    Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('admin.role.edit')->middleware('Permission:edit role');
    Route::post('/update/{id}', [RoleController::class, 'update'])->name('admin.role.update')->middleware('Permission:edit role');
    Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('admin.role.delete')->middleware('Permission:delete role');
});

//QL Duyệt bài viết
Route::prefix('/admin/approve-post')->middleware('AuthVip')->group(function () {
    Route::get('/', [PostController::class, 'indexApprove'])->name('admin.approve-post')->middleware('Permission:view approvePost');
    Route::get('/view/{slug}', [PostController::class, 'viewApprove'])->name('admin.approve-post.view')->middleware('Permission:view approvePost');
    Route::get('/status/public/{id}', [PostController::class, 'publicPost'])->name('admin.approve-post.public')->middleware('Permission:edit approvePost');
    Route::post('/status/reject/{id}', [PostController::class, 'rejectPost'])->name('admin.approve-post.reject')->middleware('Permission:edit approvePost');
});
 
Route::get('/', [TinController::class, 'trangchu'])->name('trangchu');
Route::get('/tin-moi', [TinController::class, 'tinmoi'])->name('tinmoi');
Route::get('/tin-xem-nhieu', [TinController::class, 'tinxemnhieu'])->name('tinxemnhieu');
Route::get('/the-loai/{slug}', [TinController::class, 'loaitin'])->name('loaitin');
Route::get('/bai-viet/{slug}', [TinController::class, 'tinchitiet'])->name('tinchitiet');

Route::post('/comment', [CommentController::class, 'store'])->name('comment');
Route::post('/commentUpdate', [CommentController::class, 'update'])->name('comment.update');
Route::get('/commentDelete/{id}', [CommentController::class, 'Delete'])->name('comment.delete');




require __DIR__ . '/auth.php';
