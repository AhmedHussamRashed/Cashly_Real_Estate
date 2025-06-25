@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-md mx-auto text-white">
    <h2 class="text-2xl font-bold mb-6">إضافة مستخدم جديد</h2>
    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block mb-1">الاسم</label>
            <input type="text" name="name" class="w-full p-2 rounded bg-gray-800 border border-gray-600 text-white" required>
        </div>
        <div>
            <label class="block mb-1">البريد الإلكتروني</label>
            <input type="email" name="email" class="w-full p-2 rounded bg-gray-800 border border-gray-600 text-white" required>
        </div>
        <div>
            <label class="block mb-1">كلمة المرور</label>
            <input type="password" name="password" class="w-full p-2 rounded bg-gray-800 border border-gray-600 text-white" required>
        </div>
        <button type="submit" class="bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-600">حفظ</button>
    </form>
</div>
@endsection
