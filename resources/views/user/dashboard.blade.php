<!-- resources/views/user/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="py-6">
        <h1 class="text-3xl font-semibold text-white">لوحة تحكم المستخدم</h1>
        <p class="text-gray-400 mt-2">مرحبًا بك في لوحة تحكم المستخدم. هنا يمكنك تصفح العقارات المتاحة.</p>

        <!-- عرض العقارات المتاحة -->
        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($properties as $property)
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-4">
                <img class="w-full h-48 object-cover rounded-lg" src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->title }}">
                <h2 class="text-xl font-semibold mt-4">{{ $property->title }}</h2>
                <p class="text-gray-600 mt-2">{{ Str::limit($property->description, 100) }}</p>
                <p class="text-lg font-semibold mt-2 text-gray-900">{{ $property->price }} جنيه</p>
                <a href="{{ route('user.properties.show', $property->id) }}" class="mt-4 inline-block text-blue-500 hover:text-blue-700">تفاصيل العقار</a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
