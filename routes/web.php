<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Student\AccountController;
use App\Http\Controllers\Student\DocumentController;
use App\Http\Controllers\Student\ParentController;
use App\Http\Controllers\Student\PersonalDataController;
use App\Http\Controllers\Student\PresenceController;
use App\Http\Controllers\Student\ScoreController;
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
    return view('auth.login');
});
Route::group(['prefix' => 'bosa'], function($router){
    $router->get('/login', [AdminAuthController::class, 'viewLogin'])->name('admin.login');
    $router->post('/login', [AdminAuthController::class, 'processLogin'])->name('admin.process.login');
});

Route::group(['prefix' => 'student'], function($router){
    $router->post('/register', [AuthController::class, 'studentRegister'])->name('student.register');
    $router->post('/login', [AuthController::class, 'studentLogin'])->name('student.login');
    $router->get('/reset', [AuthController::class, 'viewReset'])->name('student.auth.reset');
    $router->post('/reset', [AuthController::class, 'resetPassword'])->name('student.auth.process.reset');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::group(['prefix' => 'siswa'], function($router) {
    $router->group(['prefix' => 'pengaturan'], function($router){
        $router->get('/data-diri', [AccountController::class, 'pagePersonalData'])->name('page_personal_data');
        $router->get('/orangtua', [AccountController::class, 'pageParent'])->name('page_parent_data');
        $router->get('/wali', [AccountController::class, 'pageWali'])->name('page_wali_data');
        $router->get('/absensi', [AccountController::class, 'pagePresenceData'])->name('page_presence_data');
        $router->get('/nilai', [AccountController::class, 'pageScore'])->name('page_score_data');
        $router->get('/dokumen', [AccountController::class, 'pageDocument'])->name('page_document_data');
    });
    $router->group(['prefix' => 'pengaturan/update/'], function($router){
        $router->post('/data-diri', [PersonalDataController::class, 'settingPersonalData'])->name('setting_personal_data');
        $router->post('/asal-sekolah', [PersonalDataController::class, 'settingSchoolOrigin'])->name('setting_school_origin');
        $router->post('/absen-kelas-tujuh', [PresenceController::class, 'settingPresenceSeven'])->name('setting_presence_seven');
        $router->post('/absen-kelas-delapan', [PresenceController::class, 'settingPresenceEight'])->name('setting_presence_eight');
        $router->post('/absen-kelas-sembilan', [PresenceController::class, 'settingPresenceNine'])->name('setting_presence_nine');
        $router->post('/absen', [PresenceController::class, 'storePresence'])->name('setting_presence');
        $router->post('/data-ayah', [ParentController::class, 'storeStudentFather'])->name('setting_student_father');
        $router->post('/data-ibu', [ParentController::class, 'storeStudentMother'])->name('setting_student_mother');
        $router->post('/data-wali', [ParentController::class, 'storeStudentWali'])->name('setting_student_wali');
        $router->post('/data-nilai', [ScoreController::class, 'createOrUpdateScore'])->name('setting_score');
        $router->post('/data-dokumen', [DocumentController::class, 'createUpdateDocument'])->name('setting_document');
    });
    $router->get('/siswa/formulir', [HomeController::class, 'studentPrintPdf'])->name('student_formulir');
});

Route::group(['prefix' => 'bosa/admin'], function($router) {
    $router->get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    $router->get('/broadcast', [DashboardController::class, 'listBroadcast'])->name('admin.broadcast');
    $router->get('/broadcast/datatable', [DashboardController::class, 'datatableBroadcast'])->name('admin.broadcast.datatable');
    $router->get('/broadcast/tambah', [DashboardController::class, 'createBroadcast'])->name('admin.broadcast.create');
    $router->post('/broadcast/store', [DashboardController::class, 'storeBroadcast'])->name('admin.broadcast.store');
    $router->get('/broadcast/edit/{id}', [DashboardController::class, 'editBroadcast'])->name('admin.broadcast.edit');
    $router->post('/broadcast/update/{id}', [DashboardController::class, 'updateBroadcast'])->name('admin.broadcast.update');
    $router->post('/broadcast/delete/{id}', [DashboardController::class, 'deleteBroadcast'])->name('admin.broadcast.delete');
    $router->group(['prefix' => 'siswa'], function($router){
        $router->get('/siswa/formulir/{id}', [DashboardController::class, 'downloadFormulir'])->name('admin.formulir');
        $router->get('/datatable', [DashboardController::class, 'datatable'])->name('admin.student.datatable');
        $router->get('/detail/{id}', [DashboardController::class, 'detailStudent'])->name('admin.student.detail');
        $router->get('/edit/{id}', [DashboardController::class, 'editStudent'])->name('admin.student.edit');
        $router->post('/update/{id}', [DashboardController::class, 'updateStudent'])->name('admin.student.update');
    });
    
});
