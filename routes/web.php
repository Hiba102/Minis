<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MiniController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\UsersController;

use App\Models\Mini;

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

    if (Auth::user()) {
    return view('minis.index',['title'=>'Home Page','minis'=>Auth::user()->following_minis()]);
    }
    return view('visitor');
});

Route::get('/test',function() {
   dd(Auth::user()->following()->get());
    
    return "test";

});
Route::get('/discover',[MiniController::class,'discover'])->name('discover');

Route::resource('/minis',MiniController::class);

Route::controller(ConversationController::class)
       ->prefix('/conversations')
       ->as('conversations.')
       ->group(function() {
    Route::get('/','index')->name('index');
Route::get('/{user}/create','create')->name('create');
Route::post('/{user}','store')->name('store');
Route::get('/{user}','show')->name('show');
Route::delete('/{user}','destroy')->name('destroy');
});


Route::controller(UsersController::class)
->group(function(){
Route::post('/follow/{user}','follow')->name('follow');
Route::delete('/unfollow/{user}','unfollow')->name('unfollow');
Route::get('/users/{user}','show_user')->name('users.show');
Route::get('/followers/{user}','list_followers')->name('followers_list');
Route::get('/following/{user}','list_followed')->name('following_list');
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
