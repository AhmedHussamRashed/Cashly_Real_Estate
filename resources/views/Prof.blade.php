<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .font-arabic { font-family: 'Cairo', sans-serif; }
    .font-english { font-family: 'Inter', sans-serif; }
  </style>
</head>
<body class="bg-gray-900 font-english text-white">

  <!-- Navbar -->
  <nav class="flex justify-between items-center p-4 shadow-md bg-gray-800">
    <div class="text-2xl font-bold text-blue-600">Cashly</div>
    <div class="flex gap-4 items-center">
      <a href="#" class="text-gray-300 hover:text-blue-600">Home</a>
      <a href="#" class="text-gray-300 hover:text-blue-600">About the Site</a>
      <a href="#" class="text-gray-300 hover:text-blue-600">Contact Us</a>
      <button onclick="toggleLang()" class="bg-blue-600 text-white px-4 py-1 rounded">AR</button>
    </div>
  </nav>

  <!-- Profile Section -->
  <section class="py-16 px-6 text-center bg-gray-800 shadow-lg mx-4 mt-6 rounded-lg">
    <div class="flex justify-center mb-8">
      <img src="https://via.placeholder.com/120" alt="Profile Picture" class="w-32 h-32 rounded-full border-4 border-blue-600">
    </div>
    <h2 class="text-3xl font-semibold text-white">Welcome to your profile, John Doe</h2>
    <p class="text-lg text-gray-400 mt-2">Real Estate Developer | Located in Cairo</p>
    
    <!-- Edit Profile Button -->
    <div class="mt-6">
      <a href="#" class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow">Edit Profile</a>
    </div>
  </section>

  <!-- Settings Section -->
  <section class="py-12 px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-center">
    <div class="shadow p-6 rounded bg-gray-800">
      <h3 class="text-xl font-semibold mb-2">Settings</h3>
      <p class="text-gray-400">Change your account settings.</p>
      <a href="#" class="text-blue-600 hover:underline mt-4 inline-block">Edit Settings</a>
    </div>
    <div class="shadow p-6 rounded bg-gray-800">
      <h3 class="text-xl font-semibold mb-2">Privacy</h3>
      <p class="text-gray-400">Manage your privacy and sharing settings.</p>
      <a href="#" class="text-blue-600 hover:underline mt-4 inline-block">Edit Privacy</a>
    </div>
    <div class="shadow p-6 rounded bg-gray-800">
      <h3 class="text-xl font-semibold mb-2">Change Password</h3>
      <p class="text-gray-400">Update your account password.</p>
      <a href="#" class="text-blue-600 hover:underline mt-4 inline-block">Change Password</a>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-800 text-center py-6 text-gray-400 mt-10">
    All rights reserved © 2025
  </footer>

  <!-- Language Switch -->
  <script>
    function toggleLang() {
      const html = document.documentElement;
      if (html.lang === 'en') {
        html.lang = 'ar';
        html.dir = 'rtl';
        document.body.classList.remove('font-english');
        document.body.classList.add('font-arabic');
        document.title = 'الملف الشخصي';
        document.querySelector('h2').innerText = 'أهلاً بك في حسابك، أحمد راشد';
        document.querySelector('p').innerText = 'مطور عقاري | مقيم في القاهرة';
        document.querySelector('a.bg-blue-600').innerText = 'تعديل البيانات';
        document.querySelectorAll('nav a')[0].innerText = 'الرئيسية';
        document.querySelectorAll('nav a')[1].innerText = 'عن الموقع';
        document.querySelectorAll('nav a')[2].innerText = 'اتصل بنا';
        document.querySelector('button').innerText = 'EN';
      } else {
        html.lang = 'en';
        html.dir = 'ltr';
        document.body.classList.remove('font-arabic');
        document.body.classList.add('font-english');
        document.title = 'Profile Page';
        document.querySelector('h2').innerText = 'Welcome to your profile, Ahmed Rashed';
        document.querySelector('p').innerText = 'Real Estate Developer | Located in Cairo';
        document.querySelector('a.bg-blue-600').innerText = 'Edit Profile';
        document.querySelectorAll('nav a')[0].innerText = 'Home';
        document.querySelectorAll('nav a')[1].innerText = 'About the Site';
        document.querySelectorAll('nav a')[2].innerText = 'Contact Us';
        document.querySelector('button').innerText = 'AR';
      }
    }
  </script>
</body>
</html>
