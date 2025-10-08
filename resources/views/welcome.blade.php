<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Welcome | Cars Dashboard</title>

  <!-- Tailwind CSS + Custom Fonts -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            primary: '#6366F1',
            soft: '#EEF2FF'
          },
          fontFamily: {
            sans: ['Inter', 'ui-sans-serif', 'system-ui']
          }
        }
      }
    };
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet" />

  <!-- Animate on Scroll -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet"/>
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
</head>

<body class="bg-gradient-to-br from-soft via-white to-soft min-h-screen flex items-center justify-center font-sans" onload="AOS.init()">

  <!-- Auth Message -->
  @if(request('unauthorized'))
    <div id="auth-popup" class="fixed inset-0 bg-black/60 backdrop-blur-md flex items-center justify-center z-50" onclick="closePopup()">
      <div class="bg-white/80 p-6 rounded-2xl shadow-2xl w-[320px] text-center relative" onclick="event.stopPropagation()">
        <button onclick="closePopup()"
        class="absolute top-3 right-3 text-red-500 hover:text-red-400 text-3xl font-bold leading-none"> ×</button>


        <p class="text-gray-700 font-medium mb-5">🔐 Please log in first.</p>
        <button onclick="window.location.href='/login'"
                class="px-5 py-2 text-white bg-primary hover:bg-indigo-600 rounded-lg transition">OK</button>
      </div>
    </div>
    <script>function closePopup(){document.getElementById('auth-popup').style.display='none';}</script>
  @endif

  
  <main 
  class="relative w-full max-w-xl mx-auto px-6 py-10 bg-white rounded-3xl shadow-xl text-center space-y-4 overflow-hidden" 
  data-aos="zoom-in" data-aos-duration="900">

  <!-- Top Logo Image (tight above title) -->
  <img src="{{ asset('images/auto_car-06.jpg') }}" alt="Cars Dashboard Logo"
       class="w-72 mx-auto -mb-2 select-none pointer-events-none object-contain rounded-xl" />

  <!-- Content -->
  
    <br>
  </br>

    <h1 class="text-3xl md:text-4xl font-extrabold text-primary tracking-tight flex justify-center items-center gap-2">
      Welcome to Cars Dashboard
    </h1>

    <p class="text-gray-600 text-base md:text-lg leading-relaxed mt-2">
      This dashboard helps you easily manage, search, and explore car listings with speed and style.
    </p>

    <p class="text-primary font-semibold tracking-wide text-sm uppercase mt-1">
      — Built by Waleed —
    </p>

    <div class="flex justify-center gap-4 flex-wrap mt-5">
      <a href="/login"
         class="px-6 py-3 bg-primary text-white rounded-full font-semibold shadow hover:shadow-lg transition transform hover:scale-105">
        🔑 Login
      </a>
      <a href="/register"
         class="px-6 py-3 bg-white border-2 border-primary text-primary rounded-full font-semibold hover:bg-primary hover:text-white transition transform hover:scale-105">
        📝 Register
      </a>
    </div>
  </div>
</main>







</body>
</html>
