@extends('layouts.admin')

@section('content')
<div class="p-6 text-white">
    <h2 class="text-2xl font-bold mb-4">إدارة العقارات</h2>
    <a href="{{ route('admin.properties.create') }}" class="bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-600">إضافة عقار</a>
    <table class="w-full mt-6 table-auto bg-gray-800 rounded">
        <thead>
            <tr class="text-left bg-gray-700">
                <th class="px-4 py-2">العنوان</th>
                <th class="px-4 py-2">السعر</th>
                <th class="px-4 py-2">المالك</th>
                <th class="px-4 py-2">الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $property)
                <tr class="border-t border-gray-600 hover:bg-gray-700">
                    <td class="px-4 py-2">{{ $property->title }}</td>
                    <td class="px-4 py-2">{{ $property->price }}</td>
                    <td class="px-4 py-2">{{ $property->user->name ?? 'غير معروف' }}</td>
                    <td class="px-4 py-2">
                        <form action="{{ route('admin.properties.delete', $property->id) }}" method="POST" onsubmit="return confirm('هل تريد الحذف؟');">
                            @csrf @method('DELETE')
                            <button class="text-red-500 hover:underline">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
