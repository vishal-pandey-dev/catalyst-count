<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CsvImportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::resource('home', HomeController::class);


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/users/login', [HomeController::class, 'login'])->name('user.login');
Route::get('/users/registration', [HomeController::class, 'registration'])->name('user.registration');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/users', [HomeController::class, 'users'])->name('users');

// Route::group(['middleware' => ['user', 'verified']], function(){
Route::get('/csvupload', [HomeController::class, 'csvupload'])->name('csvupload');
Route::post('import-csv', [CsvImportController::class, 'import'])->name('csv.import');
// });