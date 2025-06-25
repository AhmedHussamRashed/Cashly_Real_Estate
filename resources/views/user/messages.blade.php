<!-- resources/views/user/messages/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="py-6">
        <h1 class="text-3xl font-semibold text-white">الرسائل الخاصة بك</h1>

        <div class="mt-8">
            @foreach ($messages as $message)
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-4 mb-6">
                <h3 class="text-xl font-semibold">{{ $message->sender->name }}: <span class="text-gray-500">{{ $message->subject }}</span></h3>
                <p class="text-gray-600 mt-2">{{ $message->content }}</p>
                <p class="text-sm text-gray-500 mt-2">تم الإرسال في: {{ $message->created_at->format('d-m-Y H:i') }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
