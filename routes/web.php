<?php

use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\frontend\ContactController as LienheController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\LoginController;
use App\Http\Controllers\frontend\ProductController as SanphamController;
use App\Http\Controllers\frontend\RegisterController;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('site.home'); //trang chủ
Route::get('/tat-ca-san-pham', [SanphamController::class, 'index']);
Route::get('/chi-tiet-san-pham/{id}', [SanphamController::class, 'product_detail']);
Route::get('/lien-he', [LienheController::class, 'index']);
Route::get('/dang-nhap', [LoginController::class, 'index']);
Route::get('/dang-ki', [RegisterController::class, 'index']);


Route::prefix('admin')->group(function () {
    Route::get("/", [DashboardController::class, "index"])->name("admin.dashboard.index");

    Route::prefix('product')->group(function () {
        Route::get("/", [ProductController::class, "index"])->name("admin.product.index");
        Route::get("trash", [ProductController::class, "trash"])->name("admin.product.trash");
        Route::get("create", [ProductController::class, "create"])->name("admin.product.create");
        Route::post("store", [ProductController::class, "store"])->name("admin.product.store"); // Sử dụng POST cho lưu trữ
        Route::get("show/{id}", [ProductController::class, "show"])->name("admin.product.show");
        Route::get("edit/{id}", [ProductController::class, "edit"])->name("admin.product.edit");
        Route::put("update/{id}", [ProductController::class, "update"])->name("admin.product.update"); // Sử dụng PUT cho cập nhật
        Route::get("status/{id}", [ProductController::class, "status"])->name("admin.product.status"); // Sử dụng PATCH cho cập nhật một phần
        Route::delete("delete/{id}", [ProductController::class, "delete"])->name("admin.product.delete"); // Sử dụng DELETE cho xóa tạm
        Route::patch("restore/{id}", [ProductController::class, "restore"])->name("admin.product.restore"); // Sử dụng PATCH cho khôi phục
        Route::delete("destroy/{id}", [ProductController::class, "destroy"])->name("admin.product.destroy"); // Sử dụng DELETE cho xóa vĩnh viễn
    });

    Route::prefix('category')->group(function () {
        Route::get("/", [CategoryController::class, "index"])->name("admin.category.index");
        Route::get("trash", [CategoryController::class, "trash"])->name("admin.category.trash");
        Route::get("create", [CategoryController::class, "create"])->name("admin.category.create");
        Route::post("store", [CategoryController::class, "store"])->name("admin.category.store"); // Sử dụng POST cho lưu trữ
        Route::get("show/{id}", [CategoryController::class, "show"])->name("admin.category.show");
        Route::get("edit/{id}", [CategoryController::class, "edit"])->name("admin.category.edit");
        Route::put("update/{id}", [CategoryController::class, "update"])->name("admin.category.update"); // Sử dụng PUT cho cập nhật
        Route::patch("status/{id}", [CategoryController::class, "status"])->name("admin.category.status"); // Sử dụng PATCH cho cập nhật một phần
        Route::delete("delete/{id}", [CategoryController::class, "delete"])->name("admin.category.delete"); // Sử dụng DELETE cho xóa tạm
        Route::patch("restore/{id}", [CategoryController::class, "restore"])->name("admin.category.restore"); // Sử dụng PATCH cho khôi phục
        Route::delete("destroy/{id}", [CategoryController::class, "destroy"])->name("admin.category.destroy"); // Sử dụng DELETE cho xóa vĩnh viễn
    });

    Route::prefix('brand')->group(function () {
        Route::get("/", [BrandController::class, "index"])->name("admin.brand.index");
        Route::get("trash", [BrandController::class, "trash"])->name("admin.brand.trash");
        Route::get("create", [BrandController::class, "create"])->name("admin.brand.create");
        Route::post("store", [BrandController::class, "store"])->name("admin.brand.store"); // Sử dụng POST cho lưu trữ
        Route::get("show/{id}", [BrandController::class, "show"])->name("admin.brand.show");
        Route::get("edit/{id}", [BrandController::class, "edit"])->name("admin.brand.edit");
        Route::put("update/{id}", [BrandController::class, "update"])->name("admin.brand.update"); // Sử dụng PUT cho cập nhật
        Route::patch("status/{id}", [BrandController::class, "status"])->name("admin.brand.status"); // Sử dụng PATCH cho cập nhật một phần
        Route::delete("delete/{id}", [BrandController::class, "delete"])->name("admin.brand.delete"); // Sử dụng DELETE cho xóa tạm
        Route::patch("restore/{id}", [BrandController::class, "restore"])->name("admin.brand.restore"); // Sử dụng PATCH cho khôi phục
        Route::delete("destroy/{id}", [BrandController::class, "destroy"])->name("admin.brand.destroy"); // Sử dụng DELETE cho xóa vĩnh viễn
    });
    Route::prefix('post')->group(function () {
        Route::get("/", [PostController::class, "index"])->name("admin.post.index");
        Route::get("trash", [PostController::class, "trash"])->name("admin.post.trash");
        Route::get("create", [PostController::class, "create"])->name("admin.post.create");
        Route::post("store", [PostController::class, "store"])->name("admin.post.store"); // Sử dụng POST cho lưu trữ
        Route::get("show/{id}", [PostController::class, "show"])->name("admin.post.show");
        Route::get("edit/{id}", [PostController::class, "edit"])->name("admin.post.edit");
        Route::put("update/{id}", [PostController::class, "update"])->name("admin.post.update"); // Sử dụng PUT cho cập nhật
        Route::patch("status/{id}", [PostController::class, "status"])->name("admin.post.status"); // Sử dụng PATCH cho cập nhật một phần
        Route::delete("delete/{id}", [PostController::class, "delete"])->name("admin.post.delete"); // Sử dụng DELETE cho xóa tạm
        Route::patch("restore/{id}", [PostController::class, "restore"])->name("admin.post.restore"); // Sử dụng PATCH cho khôi phục
        Route::delete("destroy/{id}", [PostController::class, "destroy"])->name("admin.post.destroy"); // Sử dụng DELETE cho xóa vĩnh viễn
    });
    //topic
    Route::prefix('topic')->group(function () {
        Route::get("/", [TopicController::class, "index"])->name("admin.topic.index");
        Route::get("trash", [TopicController::class, "trash"])->name("admin.topic.trash");
        Route::get("create", [TopicController::class, "create"])->name("admin.topic.create");
        Route::post("store", [TopicController::class, "store"])->name("admin.topic.store"); // Sử dụng POST cho lưu trữ
        Route::get("show/{id}", [TopicController::class, "show"])->name("admin.topic.show");
        Route::get("edit/{id}", [TopicController::class, "edit"])->name("admin.topic.edit");
        Route::put("update/{id}", [TopicController::class, "update"])->name("admin.topic.update"); // Sử dụng PUT cho cập nhật
        Route::patch("status/{id}", [TopicController::class, "status"])->name("admin.topic.status"); // Sử dụng PATCH cho cập nhật một phần
        Route::delete("delete/{id}", [TopicController::class, "delete"])->name("admin.topic.delete"); // Sử dụng DELETE cho xóa tạm
        Route::patch("restore/{id}", [TopicController::class, "restore"])->name("admin.topic.restore"); // Sử dụng PATCH cho khôi phục
        Route::delete("destroy/{id}", [TopicController::class, "destroy"])->name("admin.topic.destroy"); // Sử dụng DELETE cho xóa vĩnh viễn
    });
    //user
    Route::prefix('user')->group(function () {
        Route::get("/", [UserController::class, "index"])->name("admin.user.index");
        Route::get("trash", [UserController::class, "trash"])->name("admin.user.trash");
        Route::get("create", [UserController::class, "create"])->name("admin.user.create");
        Route::post("store", [UserController::class, "store"])->name("admin.user.store"); // Sử dụng POST cho lưu trữ
        Route::get("show/{id}", [UserController::class, "show"])->name("admin.user.show");
        Route::get("edit/{id}", [UserController::class, "edit"])->name("admin.user.edit");
        Route::put("update/{id}", [UserController::class, "update"])->name("admin.user.update"); // Sử dụng PUT cho cập nhật
        Route::patch("status/{id}", [UserController::class, "status"])->name("admin.user.status"); // Sử dụng PATCH cho cập nhật một phần
        Route::delete("delete/{id}", [UserController::class, "delete"])->name("admin.user.delete"); // Sử dụng DELETE cho xóa tạm
        Route::patch("restore/{id}", [UserController::class, "restore"])->name("admin.user.restore"); // Sử dụng PATCH cho khôi phục
        Route::delete("destroy/{id}", [UserController::class, "destroy"])->name("admin.user.destroy"); // Sử dụng DELETE cho xóa vĩnh viễn
    });
    //order
    Route::prefix('order')->group(function () {
        Route::get("/", [OrderController::class, "index"])->name("admin.order.index");
        Route::get("trash", [OrderController::class, "trash"])->name("admin.order.trash");
        Route::get("create", [OrderController::class, "create"])->name("admin.order.create");
        Route::post("store", [OrderController::class, "store"])->name("admin.order.store"); // Sử dụng POST cho lưu trữ
        Route::get("show/{id}", [OrderController::class, "show"])->name("admin.order.show");
        Route::get("edit/{id}", [OrderController::class, "edit"])->name("admin.order.edit");
        Route::put("update/{id}", [OrderController::class, "update"])->name("admin.order.update"); // Sử dụng PUT cho cập nhật
        Route::patch("status/{id}", [OrderController::class, "status"])->name("admin.order.status"); // Sử dụng PATCH cho cập nhật một phần
        Route::delete("delete/{id}", [OrderController::class, "delete"])->name("admin.order.delete"); // Sử dụng DELETE cho xóa tạm
        Route::patch("restore/{id}", [OrderController::class, "restore"])->name("admin.order.restore"); // Sử dụng PATCH cho khôi phục
        Route::delete("destroy/{id}", [OrderController::class, "destroy"])->name("admin.order.destroy"); // Sử dụng DELETE cho xóa vĩnh viễn
    });
    //menu
    Route::prefix('menu')->group(function () {
        Route::get("/", [MenuController::class, "index"])->name("admin.menu.index");
        Route::get("trash", [MenuController::class, "trash"])->name("admin.menu.trash");
        Route::get("create", [MenuController::class, "create"])->name("admin.menu.create");
        Route::post("store", [MenuController::class, "store"])->name("admin.menu.store"); 
        Route::get("show/{id}", [MenuController::class, "show"])->name("admin.menu.show");
        Route::get("edit/{id}", [MenuController::class, "edit"])->name("admin.menu.edit");
        Route::put("update/{id}", [MenuController::class, "update"])->name("admin.menu.update");
        Route::patch("status/{id}", [MenuController::class, "status"])->name("admin.menu.status"); 
        Route::delete("delete/{id}", [MenuController::class, "delete"])->name("admin.menu.delete"); 
        Route::patch("restore/{id}", [MenuController::class, "restore"])->name("admin.menu.restore"); 
        Route::delete("destroy/{id}", [MenuController::class, "destroy"])->name("admin.menu.destroy"); 
    });
    //contact
    Route::prefix('contact')->group(function () {
        Route::get("/", [ContactController::class, "index"])->name("admin.contact.index");
        Route::get("trash", [ContactController::class, "trash"])->name("admin.contact.trash");
        Route::get("create", [ContactController::class, "create"])->name("admin.contact.create");
        Route::post("store", [ContactController::class, "store"])->name("admin.contact.store"); // Sử dụng POST cho lưu trữ
        Route::get("show/{id}", [ContactController::class, "show"])->name("admin.contact.show");
        Route::get("edit/{id}", [ContactController::class, "edit"])->name("admin.contact.edit");
        Route::put("update/{id}", [ContactController::class, "update"])->name("admin.contact.update"); // Sử dụng PUT cho cập nhật
        Route::patch("status/{id}", [ContactController::class, "status"])->name("admin.contact.status"); // Sử dụng PATCH cho cập nhật một phần
        Route::delete("delete/{id}", [ContactController::class, "delete"])->name("admin.contact.delete"); // Sử dụng DELETE cho xóa tạm
        Route::patch("restore/{id}", [ContactController::class, "restore"])->name("admin.contact.restore"); // Sử dụng PATCH cho khôi phục
        Route::delete("destroy/{id}", [ContactController::class, "destroy"])->name("admin.contact.destroy"); // Sử dụng DELETE cho xóa vĩnh viễn
    });
    //banner
    Route::prefix('banner')->group(function () {
        Route::get("/", [BannerController::class, "index"])->name("admin.banner.index");
        Route::get("trash", [BannerController::class, "trash"])->name("admin.banner.trash");
        Route::get("create", [BannerController::class, "create"])->name("admin.banner.create");
        Route::post("store", [BannerController::class, "store"])->name("admin.banner.store"); // Sử dụng POST cho lưu trữ
        Route::get("show/{id}", [BannerController::class, "show"])->name("admin.banner.show");
        Route::get("edit/{id}", [BannerController::class, "edit"])->name("admin.banner.edit");
        Route::put("update/{id}", [BannerController::class, "update"])->name("admin.banner.update"); // Sử dụng PUT cho cập nhật
        Route::patch("status/{id}", [BannerController::class, "status"])->name("admin.banner.status"); // Sử dụng PATCH cho cập nhật một phần
        Route::delete("delete/{id}", [BannerController::class, "delete"])->name("admin.banner.delete"); // Sử dụng DELETE cho xóa tạm
        Route::patch("restore/{id}", [BannerController::class, "restore"])->name("admin.banner.restore"); // Sử dụng PATCH cho khôi phục
        Route::delete("destroy/{id}", [BannerController::class, "destroy"])->name("admin.banner.destroy"); // Sử dụng DELETE cho xóa vĩnh viễn
    });
});