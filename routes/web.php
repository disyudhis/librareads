<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Livewire\Auth\LoginViewIndex;
use App\Http\Livewire\Auth\RegisterViewIndex;
use App\Http\Livewire\Pages\Admin\Books\AdminBooksIndex;
use App\Http\Livewire\Pages\Admin\Books\AdminBooksManage;
use App\Http\Livewire\Pages\Admin\Dashboard\AdminDashboardIndex;
use App\Http\Livewire\Pages\Admin\Members\AdminMembersIndex;
use App\Http\Livewire\Pages\Admin\Members\AdminMembersManage;
use App\Http\Livewire\Pages\Member\Dashboard\MemberDashboardIndex;
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

Route::get('/login', function () {
    return redirect(route('landing-page'));
});

Auth::routes([
    'register' => false,
    'login' => false,
]);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', LoginViewIndex::class)->name('landing-page');
    Route::get('/register', RegisterViewIndex::class)->name('register-page');
});
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/admin/dashboard', AdminDashboardIndex::class)->name('admin.dashboard.index');
        Route::get('/admin/books/create', AdminBooksManage::class)->name('admin.books.create');
        Route::get('/admin/books', AdminBooksIndex::class)->name('admin.books.index');
        Route::get('/admin/members', AdminMembersIndex::class)->name('admin.members.index');
        Route::get('/admin/members/create', AdminMembersManage::class)->name('admin.members.create');
    });

    Route::group(['middleware' => 'member'], function () {
        Route::get('/member/dashboard', MemberDashboardIndex::class)->name('member.dashboard.index');
    });
});
