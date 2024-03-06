<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\AccountCreatingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SupplymentController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('landing/index');
})->name('landing');

Route::get('/text-editor', function () {
    return view('summary/text-editor');
})->name('text-editor');



Route::get('/login', function () {
    return view('login/login');
})->name('login');

Route::get('/login_ad', function () {
    return view('login/login_admin');
})->name('login_ad');


Route::get('/sign_up', function () {
    return view('login/sign_up');
})->name('sign_up');


Route::get('/meal_plan', function () {
    return view('food/meal');
})->name('meal_plan');

Route::get('/add_food/{meal}', function ($meal) {
    return view('food/add_food', ['meal' => $meal]);
})->name('add_food');

Route::get('/add_exe', function () {
    return view('');
})->name('add_exe');


Route::get('/post_comment', function () {
    return view('summary/test');
});


Route::get('/search_food', function () {
    return view('summary/summary');
});

Route::post('/login', [LoginController::class, 'process'])->name('process.login');
Route::post('/login_admin', [LoginController::class, 'process_admin'])->name('process_admin');


Route::get('/display_profile', [UserController::class, 'display_profile']) ->name('display_profile');
Route::get('/summary', [UserController::class, 'show_information']) ->name('show_information');
Route::get('/chart', [UserController::class, 'chart_calories_default']) ->name('chart_calories_default');
Route::post('/chart/select', [UserController::class, 'chart_calories']) ->name('chart_calories');
Route::post('/edit_profile', [UserController::class, 'edit_profile']) ->name('edit_profile');
Route::post('/upload_img', [UserController::class, 'upload_img']) ->name('upload_img');

Route::post('/creating_account2', [AccountCreatingController::class, 'creating2']) ->name('creating_account2');
Route::post('/creating_account', [AccountCreatingController::class, 'creating1']) ->name('creating_account');


Route::post('/adding_food', [FoodController::class, 'food_added']) -> name('food_added');
Route::post('/search_food', [FoodController::class, 'search_food']) -> name('search_food');
Route::post('/date_select', [FoodController::class, 'date_select']) -> name('date_select');

Route::get('auth/google', [GoogleController::class, 'redirect']) -> name('google-auth');
Route::get('auth/google/callback', [GoogleController::class, 'callbackGoogle']);
Route::post('creating_password', [GoogleController::class, 'creating_password']) -> name('creating_password');


Route::post('/delete_food', [FoodController::class, 'delete_food']) ->name('delete_food');
Route::get('/meal_plan', [FoodController::class, 'display_foods']) ->name('meal_plan');



Route::get('/blog', [BlogController::class, 'display_blog']) ->name('display_blog');
Route::get('/blog/create', [BlogController::class, 'display_blog_create']) ->name('display_blog_create');
Route::get('/blog/{blog}', [BlogController::class, 'display_blog_page']) ->name('display_blog_page');
Route::post('/blog/creating', [BlogController::class, 'blog_create']) ->name('blog_create');
Route::post('/upload_comment/{blog}', [BlogController::class, 'upload_comment'])->name('upload_comment');
Route::get('/text-editor/{blog}', [BlogController::class, 'text_editor'])->name('text-editor');

// Supplyment
Route::get('/supplement', [SupplymentController::class, 'display_supplement']) ->name('display_supplement');
Route::get('/supplement/detail/{id}', [SupplymentController::class, 'display_supplement_detail']) ->name('display_supplement_detail');

// Admin
Route::post('/deactive_user', [AdminController::class, 'deactive_user']) ->name('deactive_user');
Route::post('/active_user', [AdminController::class, 'active_user']) ->name('active_user');
Route::get('/user_management', [AdminController::class, 'user_management']) ->name('user_management');
Route::get('/supplement_management', [AdminController::class, 'supplement_management']) ->name('supplement_management');
Route::get('/supplement_add', [AdminController::class, 'add_supplement']) ->name('add_supplement');
Route::post('/supplement_adding', [AdminController::class, 'adding_supplement']) ->name('adding_supplement');
Route::post('/supplement_deleting', [AdminController::class, 'delete_supplement']) ->name('delete_supplement');
