<?php

use App\Http\Controllers\ChannelController;
use App\Http\Livewire\Video\AllVideo;
use App\Http\Livewire\Video\CreateVideo;
use App\Http\Livewire\Video\EditVideo;
use App\Http\Livewire\Video\WatchVideo;
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
        Route::get('/{channel}', AllVideo::class)->name('index');
        Route::get('/{channel}/create', CreateVideo::class)->name('create');
        Route::get('/{channel}/{video}/edit', EditVideo::class)->name('edit');
    });
});

Route::get('/watch/{video}', WatchVideo::class)->name('videos.watch');

