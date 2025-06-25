@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-2xl mx-auto text-white">
    <h2 class="text-2xl font-bold mb-6">إضافة عقار جديد</h2>
    <form action="{{ route('admin.properties.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block mb-1">عنوان العقار</label>
            <input type="text" name="title" class="w-full p-2 rounded bg-gray-800 border border-gray-600 text-white" required>
        </div>
        <div>
            <label class="block mb-1">الوصف</label>
            <textarea name="description" class="w-full p-2 rounded bg-gray-800 border border-gray-600 text-white" rows="4" required></textarea>
        </div>
        <div>
            <label class="block mb-1">السعر</label>
            <input type="number" name="price" class="w-full p-2 rounded bg-gray-800 border border-gray-600 text-white" required>
        </div>
        <div>
            <label class="block mb-1">اختر المالك (وكيل)</label>
            <select name="agent_id" class="w-full p-2 rounded bg-gray-800 border border-gray-600 text-white" required>
                @foreach($agents as $agent)
                    <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-600">إضافة العقار</button>
    </form>
</div>
@endsection
