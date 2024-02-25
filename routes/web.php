<?php

use App\Livewire\HomePage;
use App\Livewire\Registration;
use App\Livewire\UsersPage;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', HomePage::class);

Route::get('/users/{user}', UsersPage::class);

Route::get('/registration', Registration::class);
