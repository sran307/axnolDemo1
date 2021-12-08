<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    RegisterController,
    LoginController
    };

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
/*Clear Cache*/
Route::get('/clear_cache', function() {
    $exitCode = Artisan::call('cache:clear');
});
/*Clear Cache*/



Route::get('/',[RegisterController::class, "layout"])->name("home");
Route::get("/register","RegisterController@register")->name("register");
Route::view("/login","login")->name("login");
Route::post("get_state",[RegisterController::class, "state"]);
Route::post("/registration","RegisterController@registration");
Route::post("/login_form","RegisterController@login_form")->name("login_form");

Route::post("/add_item_form","RegisterController@add_item_form");

Route::group(['middleware' => ['web', 'loginSection']], function(){
    Route::view("/add_item","add_item")->name("add_item");
    Route::get("/logout","RegisterController@logout")->name("logout");
});


Route::get('login/google', 'LoginController@redirectToGoogle')->name("login.google");
Route::get('login/google/callback', 'LoginController@handleGoogleCallback');

Route::get('login/facebook', 'LoginController@redirectToFacebook')->name("login.facebook");
Route::get('login/facebook/callback', 'LoginController@handleFacebookCallback');
