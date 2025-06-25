@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold mb-6">مرحبًا، {{ auth()->user()->name }}</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- رابط إدارة العقارات -->
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-semibold">إدارة العقارات</h2>
                    <p class="mt-2 text-gray-400">إضافة، تعديل، أو حذف العقارات الخاصة بك.</p>
                    <a href="{{ route('agent.properties.index') }}" class="mt-4 inline-block bg-yellow-500 text-black py-2 px-4 rounded hover:bg-yellow-600">
                        إدارة العقارات
                    </a>
                </div>

                <!-- رابط الرسائل -->
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-semibold">الرسائل</h2>
                    <p class="mt-2 text-gray-400">عرض الرسائل المرسلة إليك من المستخدمين أو الوكلاء.</p>
                    <a href="{{ route('agent.messages') }}" class="mt-4 inline-block bg-yellow-500 text-black py-2 px-4 rounded hover:bg-yellow-600">
                        عرض الرسائل
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
