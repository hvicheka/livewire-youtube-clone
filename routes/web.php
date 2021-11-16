<?php

use App\Http\Controllers\ChannelController;
use App\Http\Livewire\Video\AllVideo;
use App\Http\Livewire\Video\CreateVideo;
use App\Http\Livewire\Video\ShowVideo;
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
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('channels/{channel}/edit', [ChannelController::class, 'edit'])->name('channel.edit');
    Route::group(['prefix' => 'videos', 'as' => 'videos.'], function () {
        Route::get('/videos/{channel}', AllVideo::class)->name('index');
        Route::get('/videos/{channel}', ShowVideo::class)->name('show');
        Route::get('/videos/{channel}/create', CreateVideo::class)->name('create');
    });
});
