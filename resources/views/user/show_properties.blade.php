<!-- resources/views/user/properties/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="py-6">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
            <img class="w-full h-72 object-cover rounded-lg" src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->title }}">
            <h2 class="text-3xl font-semibold mt-4">{{ $property->title }}</h2>
            <p class="text-lg text-gray-600 mt-2">{{ $property->description }}</p>
            <p class="text-lg font-semibold mt-4 text-gray-900">{{ $property->price }} جنيه</p>
            <p class="text-sm text-gray-500 mt-2">الموقع: {{ $property->location }}</p>

            <!-- نموذج إرسال رسالة إلى البائع -->
            <form action="{{ route('user.messages.store') }}" method="POST" class="mt-6">
                @csrf
                <input type="hidden" name="property_id" value="{{ $property->id }}">
                <textarea name="message" rows="4" class="w-full p-4 mt-2 bg-gray-100 rounded-lg border border-gray-300" placeholder="أرسل رسالة إلى البائع..."></textarea>
                <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded-lg">إرسال رسالة</button>
            </form>
        </div>
    </div>
</div>
@endsection
