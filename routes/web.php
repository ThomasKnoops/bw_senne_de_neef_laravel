<?php

use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
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
 *  - [PATCH] -> modify existing resource
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
 *  - [PATCH] [AUTH]  /profile
 *  - [GET]   [ANY]   /profile/{id}
 *
 *  Project:
 *
 *  - [GET]    [AUTH]      /project/create
 *  - [POST]   [AUTH]      /project/create
 *  - [GET]    [ANY]       /project/{id}
 *  - [GET]    [AUTH OWN]  /project/{id}/edit
 *  - [PATCH]  [AUTH OWN]  /project/{id}
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
 *  - [PATCH]  [AUTH ADM] /faq/{id}
 *  - [DELETE] [AUTH ADM] /faq/{id}
 *  - [GET]    [AUTH ADM] /faq/{id}/create
 *  - [POST]   [AUTH ADM] /faq/{id}/create
 *  - [PATCH]  [AUTH ADM] /faq/{cid}/{qid}
 *  - [DELETE] [AUTH ADM] /faq/{cid}/{qid}
 *
 *  News:
 *
 *  - [GET]    [AUTH ADM] /news/create
 *  - [POST]   [AUTH ADM] /news/create
 *  - [GET]    [ANY]      /news/{id}
 *  - [PATCH]  [AUTH ADM] /news/{id}
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
    Route::patch('/reset-password', [ResetPasswordController::class, 'store'])->name('reset-password.update');
});
//# [AUTH]
Route::middleware('auth')->group(function(){
    Route::get('/change-password', [ChangePasswordController::class, 'show'])->name('change-password');
    Route::patch('/change-password', [ChangePasswordController::class, 'store'])->name('change-password.update');
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout.delete');
});

/*
 * Profile
 */
//# [AUTH]
Route::middleware('auth')->group(function(){
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
//# [ANY]
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');

/*
 *  Project
 */
//# [AUTH]
Route::middleware('auth')->group(function(){
    Route::get('/project/create', [Projectcontroller::class, 'create'])->name('project.create');
    Route::post('/project/create', [Projectcontroller::class, 'store'])->name('project.store');

    //(owned)
    Route::get('/project/{id}/edit', [Projectcontroller::class, 'edit'])->name('project.edit');
    Route::patch('/project/{id}', [Projectcontroller::class, 'update'])->name('project.update');
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

    Route::patch('/faq/{id}', [FaqController::class, 'categoryUpdate'])->name('faq.category.update');
    Route::delete('/faq/{id}', [FaqController::class, 'categoryDelete'])->name('faq.category.delete');

    Route::get('/faq/{id}/create', [FaqController::class, 'questionCreate'])->name('faq.question.create');
    Route::post('/faq/{id}/create', [FaqController::class, 'questionStore'])->name('faq.question.store');
    Route::patch('/faq/{cid}/{qid}', [FaqController::class, 'questionUpdate'])->name('faq.question.update');
    Route::patch('/faq/{cid}/{qid}', [FaqController::class, 'questionDelete'])->name('faq.question.delete');

});
//# [ANY]
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/faq/{id}', [FaqController::class, 'categoryIndex'])->name('faq.category.index');

/*
 *  HOME
 */
//# [ANY]
Route::get('/', function () {
    return view('pages.Home.home');
})->name('home');

/*
 *  ABOUT
 */
//# [ANY]
Route::get('/about', function () {
    return view('pages.About.show');
})->name('about');
