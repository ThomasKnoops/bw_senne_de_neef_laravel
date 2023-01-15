<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
 *  Format: [{METHOD}] [{AUTH_TYPE}] {PATH}
 *
 *  Types of METHOD
 *  - [GET] -> read resource
 *  - [POST] -> create new resource
 *  - [PUT] -> modify existing resource
 *  - [PUT] -> replace existing resource completely
 *  - [DELETE] -> delete resource
 *
 *  Types of AUTH
 *  - [GUEST] Is not allowed to be authenticated
 *  - [AUTH]  Has to be authenticated
 *  - [AUTH OWN]  ^ but explictly be the resource owner
 *  - [AUTH ADM]  ^ but also be an admin
 *  - [ANY]   May be authenticated but not required
 *
 *
 * Routes:
 *
 *  Auth:
 *
 *  - [GET]  [GUEST] /login
 *  - [POST] [GUEST] /login
 *  - [GET]  [GUEST] /register
 *  - [POST] [GUEST] /register
 *  - [GET]  [GUEST] /forgot-password
 *  - [POST] [GUEST] /forgot-password
 *  - [GET]  [GUEST] /reset-password
 *  - [POST] [GUEST] /reset-password
 *  - [GET]  [AUTH]  /change-password
 *  - [POST] [AUTH]  /change-password
 *  - [POST] [AUTH]  /logout
 *
 *  Profile:
 *
 *  - [GET]   [AUTH]  /profile
 *  - [PUT] [AUTH]  /profile
 *  - [GET]   [ANY]   /profile/{id}
 *
 *  Project:
 *
 *  - [GET]    [AUTH]      /project/create
 *  - [POST]   [AUTH]      /project/create
 *  - [GET]    [ANY]       /project/{id}
 *  - [GET]    [AUTH OWN]  /project/{id}/edit
 *  - [PUT]  [AUTH OWN]  /project/{id}
 *  - [DELETE] [AUTH OWN]  /project/{id}
 *
 *  Contact:
 *
 *  - [GET]  [ANY]      /contact
 *  - [POST] [ANY]      /contact
 *  - [GET]  [AUTH ADM] /contact/all
 *
 *  FAQ:
 *
 *  - [GET]    [ANY]      /faq
 *  - [GET]    [AUTH ADM] /faq/create
 *  - [POST]   [AUTH ADM] /faq/create
 *  - [GET]    [ANY]      /faq/{id}
 *  - [PUT]  [AUTH ADM] /faq/{id}
 *  - [DELETE] [AUTH ADM] /faq/{id}
 *  - [GET]    [AUTH ADM] /faq/{id}/create
 *  - [POST]   [AUTH ADM] /faq/{id}/create
 *  - [PUT]  [AUTH ADM] /faq/{cid}/{qid}
 *  - [DELETE] [AUTH ADM] /faq/{cid}/{qid}
 *
 *  News:
 *
 *  - [GET]    [AUTH ADM] /news/create
 *  - [POST]   [AUTH ADM] /news/create
 *  - [GET]    [ANY]      /news/{id}
 *  - [PUT]  [AUTH ADM] /news/{id}
 *  - [DELETE] [AUTH ADM] /news/{id}
 *
 *  Home:
 *
 *  - [GET] [ANY] /
 *
 *  About:
 *
 *  - [GET] [ANY] /about
 */

/*
 * Auth
 */
//# [GUEST]
Route::middleware('guest')->group(function(){
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('/forgot-password', [ForgotPasswordController::class, 'show'])->name('forgot-password');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('forgot-password.store');
    Route::get('/reset-password', [ResetPasswordController::class, 'show'])->name('reset-password');
    Route::put('/reset-password', [ResetPasswordController::class, 'store'])->name('reset-password.update');
});
//# [AUTH]
Route::middleware('auth')->group(function(){
    Route::get('/change-password', [ChangePasswordController::class, 'show'])->name('change-password');
    Route::put('/change-password', [ChangePasswordController::class, 'store'])->name('change-password.update');
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout.delete');
});

/*
 * Profile
 */
//# [AUTH]
Route::middleware('auth')->group(function(){
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/avatar', [ProfileController::class, 'update_avatar'])->name('profile.update.avatar');

    Route::patch('/profile/{id}/admin', [ProfileController::class, 'promote_to_admin'])->name('profile.admin');
});
//# [ANY]
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profiles', [ProfileController::class, 'all'])->name('profiles');

/*
 *  Project
 */
//# [AUTH]
Route::middleware('auth')->group(function(){
    Route::get('/project/create', [Projectcontroller::class, 'create'])->name('project.create');
    Route::put('/project/create', [Projectcontroller::class, 'store'])->name('project.store');

    //(owned)
    Route::get('/project/{id}/edit', [Projectcontroller::class, 'edit'])->name('project.edit');
    Route::put('/project/{id}', [Projectcontroller::class, 'update'])->name('project.update');
    Route::put('/project/{id}/thumbnail', [Projectcontroller::class, 'update_thumbnail'])->name('project.update.thumbnail');
    Route::put('/project/{id}/cover', [Projectcontroller::class, 'update_cover'])->name('project.update.cover');
    Route::delete('/project/{id}', [Projectcontroller::class, 'destroy'])->name('project.delete');

});
//# [ANY]
Route::get('/project/{id}', [Projectcontroller::class, 'show'])->name('project.show');

/*
 *  Contact
 */
//# [AUTH]
Route::middleware('auth')->group(function(){
    //(adm)
    Route::get('/contact/all', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/contact/{id}/answer', [ContactController::class, 'answer_show'])->name('contact.answer_show');
    Route::post('/contact/{id}/answer', [ContactController::class, 'answer_store'])->name('contact.answer_store');
    Route::delete('/contact/{id}', [ContactController::class, 'destroy'])->name('contact.delete');
});
//# [ANY]
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

/*
 *  FAQ
 */
//# [AUTH]
Route::middleware('auth')->group(function(){

    //(adm)
    Route::get('/faq/create', [FaqController::class, 'categoryCreate'])->name('faq.category.create');
    Route::post('/faq/create', [FaqController::class, 'categoryStore'])->name('faq.category.store');
    Route::get('/faq/{id}/edit', [FaqController::class, 'categoryEdit'])->name('faq.category.edit');


    Route::get('/faq/{id}/create', [FaqController::class, 'questionCreate'])->name('faq.question.create');
    Route::post('/faq/{id}/create', [FaqController::class, 'questionStore'])->name('faq.question.store');
    Route::get('/faq/{cid}/{qid}/edit', [FaqController::class, 'questionEdit'])->name('faq.question.edit');
    Route::put('/faq/{cid}/{qid}', [FaqController::class, 'questionUpdate'])->name('faq.question.update');
    Route::delete('/faq/{cid}/{qid}', [FaqController::class, 'questionDelete'])->name('faq.question.delete');


    Route::put('/faq/{id}', [FaqController::class, 'categoryUpdate'])->name('faq.category.update');
    Route::delete('/faq/{id}', [FaqController::class, 'categoryDelete'])->name('faq.category.delete');


});
//# [ANY]
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/faq/{id}', [FaqController::class, 'categoryIndex'])->name('faq.category.index');

/*
 *  HOME
 */
//# [ANY]
Route::get('/', [HomeController::class, 'index'])->name('home');

/*
 *  ABOUT
 */
//# [ANY]
Route::get('/about', function () {
    return view('pages.About.show');
})->name('about');


/*
 *  ADMIN
 */
//# [ADM]
Route::middleware('auth')->group(function(){

    //(adm)
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

});

/*
 *  NEWS
 */
//# ADM
Route::middleware('auth')->group(function (){
   Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
   Route::post('/news/create', [NewsController::class, 'store'])->name('news.store');
   Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::patch('/news/{id}/image', [NewsController::class, 'update_image'])->name('news.update_image');
   Route::patch('/news/{id}', [NewsController::class, 'update'])->name('news.update');
   Route::delete('/news/{id}', [NewsController::class, 'delete'])->name('news.delete');
});
