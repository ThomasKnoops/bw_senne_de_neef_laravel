<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
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
    Route::get('/login')->name('login.index');
    Route::post('/login')->name('login.store');
    Route::get('/register')->name('register.index');
    Route::post('/register')->name('register.store');
    Route::get('/forgot-password')->name('forgot-password.index');
    Route::post('/forgot-password')->name('forgot-password.store');
    Route::get('/reset-password')->name('reset-password.index');
    Route::patch('/reset-password')->name('reset-password.update');
});
//# [AUTH]
Route::middleware('auth')->group(function(){
    Route::get('/change-password')->name('change-password.index');
    Route::patch('/change-password')->name('change-password.update');
    Route::post('/logout')->name('logout.delete');
});

/*
 * Profile
 */
//# [AUTH]
Route::middleware('auth')->group(function(){
    Route::get('/profile')->name('profile.index');
    Route::get('/profile/edit')->name('profile.edit');
    Route::patch('/profile')->name('profile.update');
});
//# [ANY]
Route::get('/profile/{id}')->name('profile.show');

/*
 *  Project
 */
//# [AUTH]
Route::middleware('auth')->group(function(){
    Route::get('/project/create')->name('project.create');
    Route::post('/project/create')->name('project.store');

    //(owned)
    Route::get('/project/{id}/edit')->name('project.edit');
    Route::patch('/project/{id}')->name('project.update');
    Route::delete('/project/{id}')->name('project.delete');

});
//# [ANY]
Route::get('/project/{id}')->name('project.show');

/*
 *  Contact
 */
//# [AUTH]
Route::middleware('auth')->group(function(){
    //(adm)
    Route::get('/contact/all')->name('contact.show');
});
//# [ANY]
Route::get('/contact')->name('contact.index');
Route::post('/contact')->name('contact.store');

/*
 *  FAQ
 */
//# [AUTH]
Route::middleware('auth')->group(function(){

    //(adm)
    Route::get('/faq/create')->name('faq.category.create');
    Route::post('/faq/create')->name('faq.category.store');

    Route::patch('/faq/{id}')->name('faq.category.update');
    Route::delete('/faq/{id}')->name('faq.category.delete');

    Route::get('/faq/{id}/create')->name('faq.question.create');
    Route::post('/faq/{id}/create')->name('faq.question.store');
    Route::patch('/faq/{cid}/{qid}')->name('faq.question.update');
    Route::patch('/faq/{cid}/{qid}')->name('faq.question.delete');

});
//# [ANY]
Route::get('/faq')->name('faq.index');
Route::get('/faq/{id}')->name('faq.category.index');

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
