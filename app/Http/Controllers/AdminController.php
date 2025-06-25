<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Property;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // عرض لوحة تحكم المدير
    public function dashboard()
    {
        $usersCount = User::where('role', 'user')->count();
        $agentsCount = User::where('role', 'agent')->count();
        $propertiesCount = Property::count();

        return view('admin.dashboard', compact('usersCount', 'agentsCount', 'propertiesCount'));
    }

    // ===== إدارة المستخدمين =====

    // عرض المستخدمين
    public function listUsers()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.users.index', compact('users'));
    }

    // إنشاء مستخدم جديد
    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user',
        ]);

        return redirect()->back()->with('success', 'تم إضافة المستخدم بنجاح');
    }

    // حذف مستخدم
    public function deleteUser($id)
    {
        $user = User::where('role', 'user')->findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'تم حذف المستخدم بنجاح');
    }

    // ===== إدارة الوكلاء =====

    // عرض الوكلاء
    public function listAgents()
    {
        $agents = User::where('role', 'agent')->get();
        return view('admin.agents.index', compact('agents'));
    }

    // إنشاء وكيل جديد
    public function createAgent(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'agent',
        ]);

        return redirect()->back()->with('success', 'تم إضافة الوكيل بنجاح');
    }

    // حذف وكيل
    public function deleteAgent($id)
    {
        $agent = User::where('role', 'agent')->findOrFail($id);
        $agent->delete();

        return redirect()->back()->with('success', 'تم حذف الوكيل بنجاح');
    }

    // ===== إدارة العقارات =====

    // عرض جميع العقارات
    public function listProperties()
    {
        $properties = Property::with('user')->get();
        return view('admin.properties.index', compact('properties'));
    }

    // إنشاء عقار جديد
    public function createProperty(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
        ]);

        Property::create($request->all());

        return redirect()->back()->with('success', 'تم إضافة العقار بنجاح');
    }

    // حذف عقار
    public function deleteProperty($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();

        return redirect()->back()->with('success', 'تم حذف العقار بنجاح');
    }
}
