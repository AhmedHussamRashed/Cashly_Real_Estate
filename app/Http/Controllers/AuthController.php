<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // دالة لتسجيل حساب جديد
    public function signup(Request $request)
    {
        // تحقق من البيانات المدخلة
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed', // تحقق من الحقول
            'role' => 'required|in:user,agent', // تحقق من أن الدور valid
        ]);

        // إنشاء مستخدم جديد
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        // تسجيل دخول المستخدم مباشرة بعد الإنشاء
        auth()->login($user);

        // إعادة التوجيه بعد التسجيل الناجح
        return redirect()->route('home');
    }

    // دالة لتسجيل الدخول
    public function login(Request $request)
    {
        // التحقق من البيانات المدخلة
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // تحقق من أن المستخدم موجود وأدخل كلمة السر الصحيحة
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // تحقق مما إذا كان البريد الإلكتروني وكلمة السر خاصين بالمدير
            if ($request->email == 'ah12345@gmail.com' && $request->password == 'ahs12345') {
                // إعادة توجيه المستخدم إلى واجهة المدير
                return redirect()->route('admin.dashboard');
            }

            // في حالة دخول المستخدم بشكل عادي (ليس مدير)
            return redirect()->route('home');
        } else {
            // في حالة فشل التحقق من بيانات الدخول
            return back()->withErrors(['email' => 'These credentials do not match our records.']);
        }
    }
}
