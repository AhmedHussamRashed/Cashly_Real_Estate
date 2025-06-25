<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .font-arabic { font-family: 'Cairo', sans-serif; }
    .font-english { font-family: 'Inter', sans-serif; }
  </style>
</head>
<body class="bg-white font-arabic">
  <!-- Navbar -->
  <nav class="flex justify-between items-center p-4 shadow-md bg-white">
    <div class="text-2xl font-bold text-blue-600"> Site Logo</div>
    <div class="flex gap-4 items-center">
      <a href="#" class="text-gray-600 hover:text-blue-600">Home</a>
      <a href="#" class="text-gray-600 hover:text-blue-600">About the site</a>
      <a href="#" class="text-gray-600 hover:text-blue-600">Contact us</a>
      <button onclick="toggleLang()" class="bg-blue-600 text-white px-4 py-1 rounded">EN</button>
    </div>
  </nav>

  <!-- Hero Section -->
  <header class="bg-blue-100 py-16 text-center">
    <h1 class="text-4xl font-bold text-blue-700 mb-4">Welcome to our website</h1>
    <p class="text-lg text-gray-700 mb-6">The best place to list and buy real estate easily and professionally</p>
    <a href="#" class="bg-blue-600 text-white px-6 py-2 rounded shadow">Browse apartments now</a>
  </header>

  <!-- Features Section -->
  <section class="py-12 px-6 grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
    <div class="shadow p-6 rounded bg-white">
      <img src="/public/icon1.png" alt="ميزة 1" class="mx-auto w-16 h-16 mb-4">
      <h3 class="text-xl font-semibold mb-2">Ease of use</h3>
      <p class="text-gray-600">Easy and simplified interface for searching and browsing.</p>
    </div>
    <div class="shadow p-6 rounded bg-white">
      <img src="/public/icon2.png" alt="ميزة 2" class="mx-auto w-16 h-16 mb-4">
      <h3 class="text-xl font-semibold mb-2">Special offers</h3>
      <p class="text-gray-600">Apartments and real estate at competitive prices and high quality.</p>
    </div>
    <div class="shadow p-6 rounded bg-white">
      <img src="/public/icon3.png" alt="ميزة 3" class="mx-auto w-16 h-16 mb-4">
      <h3 class="text-xl font-semibold mb-2">Continuous support</h3>
      <p class="text-gray-600" >Our team is ready to help you at any time.</p>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-100 text-center py-6 text-gray-600 mt-10">
   All rights reserved © 2025
  </footer>

  <!-- لغة -->
  <script>
    function toggleLang() {
      const html = document.documentElement;
      if (html.lang === 'ar') {
        html.lang = 'en';
        html.dir = 'ltr';
        document.body.classList.remove('font-arabic');
        document.body.classList.add('font-english');
        document.title = 'Home Page';
        document.querySelector('h1').innerText = 'Welcome to our site';
        document.querySelector('p').innerText = 'The best place to buy and sell properties easily';
        document.querySelector('a.bg-blue-600').innerText = 'Browse Listings';
        document.querySelectorAll('nav a')[0].innerText = 'Home';
        document.querySelectorAll('nav a')[1].innerText = 'About';
        document.querySelectorAll('nav a')[2].innerText = 'Contact';
        document.querySelector('button').innerText = 'AR';
      } else {
        html.lang = 'ar';
        html.dir = 'rtl';
        document.body.classList.remove('font-english');
        document.body.classList.add('font-arabic');
        document.title = 'الصفحة الرئيسية';
        document.querySelector('h1').innerText = 'Welcome to our website';
        document.querySelector('p').innerText = 'The best place to list and buy real estate easily and professionally';
        document.querySelector('a.bg-blue-600').innerText = ''Browse Apartments Now'';
        document.querySelectorAll('nav a')[0].innerText = 'Home';
        document.querySelectorAll('nav a')[1].innerText = 'About The Site';
        document.querySelectorAll('nav a')[2].innerText = 'Contact Us';
        document.querySelector('button').innerText = 'EN';
      }
    }
  </script>
</body>
</html>
