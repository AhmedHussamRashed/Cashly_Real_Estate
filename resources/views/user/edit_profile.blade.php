<!-- resources/views/user/profile/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="py-6">
        <h1 class="text-3xl font-semibold text-white">تعديل البيانات الشخصية</h1>

        <form action="{{ route('user.profile.update') }}" method="POST" class="mt-6">
            @csrf
            @method('PUT')
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                <div class="mb-4">
                    <label for="name" class="text-white">الاسم:</label>
                    <input type="text" name="name" id="name" class="w-full p-3 bg-gray-100 border border-gray-300 rounded-lg" value="{{ auth()->user()->name }}" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="text-white">البريد الإلكتروني:</label>
                    <input type="email" name="email" id="email" class="w-full p-3 bg-gray-100 border border-gray-300 rounded-lg" value="{{ auth()->user()->email }}" required>
                </div>
                <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded-lg">حفظ التغييرات</button>
            </div>
        </form>
    </div>
</div>
@endsection
