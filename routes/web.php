<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminAgentController;
use App\Http\Controllers\Admin\AdminPropertyController;
use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PropertyController;

/*
|-------------------------------------------------------------------------- 
| Web Routes
|-------------------------------------------------------------------------- 
*/

// الصفحة الرئيسية
Route::get('/', function () {
    return view('welcome');
});

// صفحات المصادقة
Route::get('signup', [AuthController::class, 'signupForm'])->name('signup');
Route::post('signup', [AuthController::class, 'signup']);

Route::get('login', [AuthController::class, 'loginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

// واجهة المدير
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // إدارة المستخدمين
    Route::resource('/users', AdminUserController::class)->names([
        'index'   => 'admin.users.index',
        'create'  => 'admin.users.create',
        'store'   => 'admin.users.store',
        'destroy' => 'admin.users.destroy',
    ])->only(['index', 'create', 'store', 'destroy']);

    // إدارة الوكلاء
    Route::resource('/agents', AdminAgentController::class)->names([
        'index'   => 'admin.agents.index',
        'create'  => 'admin.agents.create',
        'store'   => 'admin.agents.store',
        'destroy' => 'admin.agents.destroy',
    ])->only(['index', 'create', 'store', 'destroy']);

    // إدارة العقارات
    Route::resource('/properties', AdminPropertyController::class)->names([
        'index'   => 'admin.properties.index',
        'create'  => 'admin.properties.create',
        'store'   => 'admin.properties.store',
        'destroy' => 'admin.properties.destroy',
    ])->only(['index', 'create', 'store', 'destroy']);

    // عرض ملفات المستخدمين
    Route::get('/profiles/{id}', [AdminDashboardController::class, 'showProfile'])->name('admin.profiles.show');
});

// واجهة البائع
Route::prefix('agent')->middleware(['auth', 'role:agent'])->group(function () {
    Route::get('/dashboard', [AgentController::class, 'dashboard'])->name('agent.dashboard');
    
    // إدارة العقارات
    Route::resource('/agent/properties', PropertyController::class);

    // عرض الرسائل الخاصة بالبائع
    Route::get('/agent/messages', [MessageController::class, 'index'])->name('agent.messages');
    Route::post('/agent/messages/send', [MessageController::class, 'store'])->name('agent.messages.send');
});


// واجهة المستخدم
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard']);
    Route::get('/properties/{property}', [UserController::class, 'showProperty'])->name('user.properties.show');
    Route::get('/messages', [UserController::class, 'messages'])->name('user.messages');
    Route::post('/messages/send', [UserController::class, 'sendMessage'])->name('user.messages.store');
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('user.profile.edit');
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/properties', [PropertyController::class, 'index'])->name('user.properties.index');
});
