<?php

use App\Models\Spatial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\SpatialsController;
use App\Http\Controllers\VillagesController;

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

Route::get('/', function (Request $request) {
    if ($request->has('search')) {
        $spatials = Spatial::with('village', 'type')->where('name', 'LIKE', '%' . $request->search . '%');
    } else {
        $spatials = Spatial::with('village', 'type');
    }

    return view('landing', compact('spatials'));
})->name('landing');

Route::get('/about', function () {
    return view('about');
})->name('about');

Auth::routes();

Route::get('/register', function () {
    return abort(404);
});

Route::post('/register', function () {
    return abort(404);
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('spatials', SpatialsController::class);
Route::resource('villages', VillagesController::class);
Route::resource('types', TypesController::class);
