<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/student/register', [AuthController::class, 'studentRegister'])->name('student.register');
Route::post('/student/login', [AuthController::class, 'studentLogin'])->name('student.login');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pengaturan-akun', [App\Http\Controllers\HomeController::class, 'accountSetting'])->name('account_setting');
Route::get('/pengaturan-orang-tua', [App\Http\Controllers\HomeController::class, 'pageParent'])->name('page_parent');
Route::get('/pengaturan-absensi', [App\Http\Controllers\HomeController::class, 'pagePresence'])->name('page_presence');
Route::get('/pengaturan-nilai', [App\Http\Controllers\HomeController::class, 'pageScore'])->name('page_score');
Route::get('/pengaturan-dokumen', [App\Http\Controllers\HomeController::class, 'pageDocument'])->name('page_document');
Route::post('/pengaturan-absensi/store-score', [App\Http\Controllers\HomeController::class, 'createOrUpdateScore'])->name('create_update_score');
Route::post('/pengaturan-absensi/store-seven', [App\Http\Controllers\HomeController::class, 'storePresenceSeven'])->name('store_presence_seven');
Route::post('/pengaturan-absensi/store-eight', [App\Http\Controllers\HomeController::class, 'storePresenceEight'])->name('store_presence_eight');
Route::post('/pengaturan-absensi/store-nine', [App\Http\Controllers\HomeController::class, 'storePresenceNine'])->name('store_presence_nine');
Route::post('/pengaturan-orang-tua/create-update-ayah', [App\Http\Controllers\HomeController::class, 'storeStudentFather'])->name('create_update_fathre');
Route::post('/pengaturan-orang-tua/create-update-ibu', [App\Http\Controllers\HomeController::class, 'storeStudentMother'])->name('create_update_mother');
Route::post('/pengaturan-akun/update-data-diri', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('update_profile');
Route::post('/pengaturan-akun/update-asal-sekolah', [App\Http\Controllers\HomeController::class, 'updateSchoolOrigin'])->name('update_school_origin');
