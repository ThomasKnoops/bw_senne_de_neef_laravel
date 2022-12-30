<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('pages.About.show');
})->name('about');

/*
 * Profile
 */
Route::get('/profile', [UserController::class, 'index'])->name('profile.index');
Route::get('/profile/{id}', [UserController::class, 'show'])->name('profile.show');

/*
 *  Project
 */
Route::get('/project/create',[ProjectController::class, 'create'])->name('project.create');
Route::post('/project/create',[ProjectController::class, 'store'])->name('project.store');

Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.show');
Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
Route::patch('/project/{id}', [ProjectController::class, 'update'])->name('project.update');
Route::delete('/project/{id}', [ProjectController::class, 'delete'])->name('project.delete');


/*
 *  Contact
 */
Route::get('/contact/',[ContactController::class, 'index'])->name('contact.index');

/*
 *  FAQ
 */
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
