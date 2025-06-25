<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة تحكم المدير</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white font-sans">

    <div class="flex min-h-screen">

        <!-- الشريط الجانبي -->
        <aside class="w-64 bg-gray-800 p-4 space-y-6">
            <h1 class="text-2xl font-bold text-yellow-400 mb-6">مدير النظام</h1>
            <nav class="space-y-3">
                <a href="{{ route('admin.dashboard') }}" class="block hover:bg-gray-700 px-4 py-2 rounded">لوحة التحكم</a>
                <a href="{{ route('admin.users.index') }}" class="block hover:bg-gray-700 px-4 py-2 rounded">إدارة المستخدمين</a>
                <a href="{{ route('admin.agents.index') }}" class="block hover:bg-gray-700 px-4 py-2 rounded">إدارة الوكلاء</a>
                <a href="{{ route('admin.properties.index') }}" class="block hover:bg-gray-700 px-4 py-2 rounded">إدارة العقارات</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left hover:bg-red-600 px-4 py-2 rounded text-red-300">تسجيل الخروج</button>
                </form>
            </nav>
        </aside>

        <!-- المحتوى الرئيسي -->
        <main class="flex-1 p-8 bg-gray-900">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-600 text-white rounded">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="mb-4 p-4 bg-red-600 text-white rounded">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>

    </div>

</body>
</html>
