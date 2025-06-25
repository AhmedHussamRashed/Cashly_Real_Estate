@extends('layouts.admin')

@section('content')
<div class="p-6 text-white">
    <h2 class="text-2xl font-bold mb-4">إدارة المستخدمين</h2>
    <a href="{{ route('admin.users.create') }}" class="bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-600">إضافة مستخدم</a>
    <table class="w-full mt-6 table-auto bg-gray-800 rounded">
        <thead>
            <tr class="text-left bg-gray-700">
                <th class="px-4 py-2">الاسم</th>
                <th class="px-4 py-2">البريد</th>
                <th class="px-4 py-2">الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="border-t border-gray-600 hover:bg-gray-700">
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2">
                        <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد؟');">
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
