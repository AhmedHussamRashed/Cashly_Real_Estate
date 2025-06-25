<?php

// ملف: app/Http/Middleware/RoleMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = auth()->user();

        if (!$user) {
            abort(403, 'Unauthorized - User not authenticated');
        }

        if (!isset($user->role) || !in_array($user->role, $roles)) {
            abort(403, 'Unauthorized - Role not permitted');
        }

        return $next($request);
    }
}


// ملف: app/Http/Kernel.php

protected $middlewareAliases = [
    'auth' => \App\Http\Middleware\Authenticate::class,
    'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
    'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
    'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
    'can' => \Illuminate\Auth\Middleware\Authorize::class,
    'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
    'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
    'precognitive' => \Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests::class,
    'signed' => \App\Http\Middleware\ValidateSignature::class,
    'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

    // هذا هو السطر الذي أضفناه:
    'role' => \App\Http\Middleware\RoleMiddleware::class,
];


// مثال على استخدام الميدلوير داخل routes/web.php

use Illuminate\Support\Facades\Route;

Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::resource('/admin/users', AdminUserController::class);
    Route::resource('/admin/agents', AdminAgentController::class);
});

Route::middleware(['role:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'dashboard']);
    Route::resource('/agent/properties', AgentPropertyController::class);
});

Route::middleware(['role:user'])->group(function () {
    Route::get('/home', [UserController::class, 'home']);
    Route::get('/properties', [PropertyController::class, 'index']);
    Route::post('/contact-agent/{id}', [UserController::class, 'contactAgent']);
});


// ملاحظة: تأكد أن جدول users يحتوي على عمود "role" من نوع string

Schema::table('users', function (Blueprint $table) {
    $table->string('role')->default('user'); // يمكن أن يكون: admin، agent، user
});
