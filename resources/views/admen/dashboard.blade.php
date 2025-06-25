<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>لوحة تحكم المدير</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen font-sans">

    <header class="bg-gray-800 shadow py-4 px-6 flex justify-between items-center">
        <h1 class="text-2xl font-bold">لوحة تحكم المدير</h1>
        <a href="{{ route('logout') }}" class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded text-sm">تسجيل الخروج</a>
    </header>

    <main class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- المستخدمين -->
            <a href="{{ url('/admin/users') }}" class="bg-gray-800 hover:bg-gray-700 p-6 rounded-xl shadow-lg transition-all duration-200">
                <h2 class="text-xl font-semibold mb-2">المستخدمين</h2>
                <p class="text-gray-400">عرض وإدارة جميع المستخدمين المسجلين.</p>
            </a>

            <!-- الوكلاء -->
            <a href="{{ url('/admin/agents') }}" class="bg-gray-800 hover:bg-gray-700 p-6 rounded-xl shadow-lg transition-all duration-200">
                <h2 class="text-xl font-semibold mb-2">الوكلاء</h2>
                <p class="text-gray-400">عرض وإدارة وكلاء بيع العقارات.</p>
            </a>

            <!-- العقارات -->
            <a href="{{ url('/admin/properties') }}" class="bg-gray-800 hover:bg-gray-700 p-6 rounded-xl shadow-lg transition-all duration-200">
                <h2 class="text-xl font-semibold mb-2">العقارات</h2>
                <p class="text-gray-400">عرض، إضافة، أو حذف الإعلانات العقارية.</p>
            </a>

        </div>

        <!-- إحصائيات -->
        <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gray-800 p-4 rounded-lg text-center">
                <h3 class="text-sm text-gray-400 mb-1">عدد المستخدمين</h3>
                <p class="text-3xl font-bold">{{ $usersCount ?? '0' }}</p>
            </div>

            <div class="bg-gray-800 p-4 rounded-lg text-center">
                <h3 class="text-sm text-gray-400 mb-1">عدد الوكلاء</h3>
                <p class="text-3xl font-bold">{{ $agentsCount ?? '0' }}</p>
            </div>

            <div class="bg-gray-800 p-4 rounded-lg text-center">
                <h3 class="text-sm text-gray-400 mb-1">عدد العقارات</h3>
                <p class="text-3xl font-bold">{{ $propertiesCount ?? '0' }}</p>
            </div>
        </div>
    </main>

</body>
</html>
