@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold mb-6">إدارة العقارات</h1>
            <a href="{{ route('agent.properties.create') }}" class="inline-block bg-yellow-500 text-black py-2 px-4 rounded hover:bg-yellow-600 mb-4">
                إضافة عقار جديد
            </a>

            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-semibold mb-4">العقارات الخاصة بك</h2>
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left">العنوان</th>
                            <th class="px-4 py-2 text-left">الوصف</th>
                            <th class="px-4 py-2 text-left">السعر</th>
                            <th class="px-4 py-2 text-left">الموقع</th>
                            <th class="px-4 py-2 text-left">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($properties as $property)
                            <tr class="border-t border-gray-700">
                                <td class="px-4 py-2">{{ $property->title }}</td>
                                <td class="px-4 py-2">{{ Str::limit($property->description, 50) }}</td>
                                <td class="px-4 py-2">{{ $property->price }} ريال</td>
                                <td class="px-4 py-2">{{ $property->location }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('agent.properties.edit', $property) }}" class="bg-blue-500 text-white py-1 px-4 rounded hover:bg-blue-600">تعديل</a>
                                    <form action="{{ route('agent.properties.destroy', $property) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white py-1 px-4 rounded hover:bg-red-600">حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
