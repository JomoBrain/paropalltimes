<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// AdminController group
Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth','PreventBackHistory']],function(){
    Route::get('/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('/users',[AdminController::class,'users'])->name('admin.users');
    Route::get('/reviews',[AdminController::class,'reviews'])->name('admin.reviews');
    Route::get('/team',[AdminController::class,'team'])->name('admin.team');

    //reviews
    Route::get('/create-review',[AdminController::class,'createReview'])->name('admin.create-review');
    Route::post('/store-review',[AdminController::class,'storeReview'])->name('admin.store-review');

    
    Route::get('/all-reviews',[AdminController::class,'allReviews'])->name('admin.all-reviews')->withoutMiddleware(['auth']);
    Route::get('/single-review/{id}',[AdminController::class,'singleReview'])->name('admin.single-review');
    Route::get('/edit-review/{id}',[AdminController::class,'editReview'])->name('admin.edit-review');
    Route::post('/update-review',[AdminController::class,'updateReview'])->name('admin.update-review');
    Route::get('/delete-review/{id}',[AdminController::class,'deleteReview'])->name('admin.delete-review');
    
    //team
    Route::get('/create-team',[TeamController::class,'createTeam'])->name('admin.create-team');
    Route::post('/store-team',[TeamController::class,'storeTeam'])->name('admin.store-team');

    Route::get('/all-team',[TeamController::class,'allTeam'])->name('admin.all-team')->withoutMiddleware(['auth','isAdmin']);
    Route::get('/single-team/{id}',[TeamController::class,'singleTeam'])->name('admin.single-team');
    Route::get('/edit-team/{id}',[TeamController::class,'editTeam'])->name('admin.edit-team');
    Route::post('/update-team',[TeamController::class,'updateTeam'])->name('admin.update-team');
    Route::get('/delete-team/{id}',[TeamController::class,'deleteTeam'])->name('admin.delete-team');

    //services
    Route::get('/create-service',[ServiceController::class,'createService'])->name('admin.create-service');
    Route::post('/store-service',[ServiceController::class,'storeService'])->name('admin.store-service');

    Route::get('/all-services',[ServiceController::class,'allServices'])->name('admin.all-services')->withoutMiddleware(['auth','isAdmin']);
    Route::get('/single-service/{id}',[ServiceController::class,'singleService'])->name('admin.single-service')->withoutMiddleware(['auth','isAdmin']);
    Route::get('/edit-service/{id}',[ServiceController::class,'editService'])->name('admin.edit-service');
    Route::post('/update-service',[serviceController::class,'updateService'])->name('admin.update-service');
    Route::get('/delete-service/{id}',[serviceController::class,'deleteService'])->name('admin.delete-service');

    //blog
    Route::get('/create-blog',[BlogController::class,'createBlog'])->name('admin.create-blog');
    Route::post('/store-blog',[BlogController::class,'storeBlog'])->name('admin.store-blog');

    Route::get('/all-blogs',[BlogController::class,'allBlogs'])->name('admin.all-blogs')->withoutMiddleware(['auth','isAdmin']);
    Route::get('/single-blog/{id}',[BlogController::class,'singleBlog'])->name('admin.single-blog')->withoutMiddleware(['auth','isAdmin']);;
    Route::get('/sb/{id}',[BlogController::class,'sB'])->name('admin.sB')->withoutMiddleware(['auth','isAdmin']);
    Route::get('/edit-blog/{id}',[BlogController::class,'editBlog'])->name('admin.edit-blog');
    Route::post('/update-blog',[BlogController::class,'updateBlog'])->name('admin.update-blog');
    Route::get('/delete-blog/{id}',[BlogController::class,'deleteBlog'])->name('admin.delete-blog');


});

// UserController group
Route::group(['prefix'=>'user','middleware'=>['isUser','auth','PreventBackHistory']],function(){
    Route::get('/dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::get('/users',[UserController::class,'users'])->name('user.users');
    Route::get('/reviews',[UserController::class,'reviews'])->name('user.reviews');
    Route::get('/team',[UserController::class,'team'])->name('user.team');

});
Route::get('/blogs',function(){
    return view('homepage.blog');
});
Route::get('/about',function(){
    return view('homepage.about');
});

// contact routes
Route::get('/contactmsg',[ContactController::class,'contact'])->name('contact');
Route::post('/sendmail',[ContactController::class,'sendMail'])->name('sendmail');