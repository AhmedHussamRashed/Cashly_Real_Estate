<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Property;
use App\Models\Message;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // عرض كل المستخدمين (للمشرف غالباً)
    public function index()
    {
        return User::all();
    }

    // عرض مستخدم مفرد
    public function show(User $user)
    {
        return $user;
    }

    // إنشاء مستخدم جديد
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string',
            'role'     => 'required|in:user,admin,agent',
            'photo'    => 'nullable|string',
        ]);

        $data['password'] = bcrypt($data['password']);

        return User::create($data);
    }

    // تحديث مستخدم
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'     => 'sometimes|string',
            'email'    => 'sometimes|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|string',
            'role'     => 'sometimes|in:user,admin,agent',
            'photo'    => 'nullable|string',
        ]);

        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $user->update($data);

        return $user;
    }

    // حذف مستخدم
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'Deleted']);
    }

    // لوحة المستخدم - عرض كل العقارات
    public function dashboard()
    {
        $properties = Property::all();
        return view('user.dashboard', compact('properties'));
    }

    // عرض تفاصيل عقار محدد
    public function showProperty(Property $property)
    {
        return view('user.properties.show', compact('property'));
    }

    // عرض الرسائل الخاصة بالمستخدم
    public function messages()
    {
        $messages = Message::where('user_id', auth()->id())->get();
        return view('user.messages.index', compact('messages'));
    }

    // إرسال رسالة
    public function sendMessage(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'message' => 'required|string',
        ]);

        Message::create([
            'user_id'     => auth()->id(),
            'property_id' => $request->property_id,
            'content'     => $request->message,
        ]);

        return back()->with('success', 'تم إرسال الرسالة');
    }

    // تعديل الملف الشخصي
    public function editProfile()
    {
        return view('user.profile.edit');
    }

    // تحديث الملف الشخصي
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name'  => 'required|string',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
        ]);

        auth()->user()->update($request->only('name', 'email'));

        return redirect()->route('user.profile.edit')->with('success', 'تم تحديث البيانات');
    }
}
