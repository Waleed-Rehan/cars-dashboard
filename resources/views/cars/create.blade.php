<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add New Car</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Tailwind Config for Theme & Dark Mode -->
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: { primary: '#4F46E5', secondary: '#E0E7FF' },
          fontFamily: { sans: ['Inter', 'ui-sans-serif', 'system-ui'] }
        }
      }
    }
  </script>
  <!-- Initial theme setup: sync with dashboard preference -->
  <script>
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
      document.documentElement.classList.add('dark');
    } else {
      document.documentElement.classList.remove('dark');
    }
  </script>
  <!-- Google Font: Inter -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 font-sans transition-colors duration-300">
  <!-- Header -->
  <header class="bg-white dark:bg-gray-800 shadow-sm">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
      <h1 class="text-2xl font-bold text-primary">Add New Car</h1>
      <a href="/dashboard"
      class="inline-flex items-center space-x-2 px-4 py-2 border border-indigo-200 bg-white text-indigo-600 font-medium rounded-full hover:bg-indigo-50 hover:border-indigo-300 hover:text-indigo-700 transition shadow-sm">
     
     <!-- SVG Back Arrow Icon -->
     <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
     </svg>
   
     <span>🏠 Back to Dashboard</span>
   </a>
   
    </div>
  </header>

  <!-- Form Content -->
  <main class="container mx-auto py-8 px-6">
    @if ($errors->any())
      <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-lg">
        <ul class="list-disc list-inside">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="/cars" method="POST" class="bg-white dark:bg-gray-800 rounded-2xl shadow-md p-6 space-y-4">
      @csrf
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <label for="brand" class="block mb-1 font-medium">Brand</label>
          <input id="brand" name="brand" type="text" placeholder="e.g. Toyota" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none bg-gray-50 dark:bg-gray-700" />
        </div>
        <div>
          <label for="model" class="block mb-1 font-medium">Model</label>
          <input id="model" name="model" type="text" placeholder="e.g. Corolla" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none bg-gray-50 dark:bg-gray-700" />
        </div>
        <div>
          <label for="year" class="block mb-1 font-medium">Year</label>
          <input id="year" name="year" type="number" placeholder="e.g. 2021" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none bg-gray-50 dark:bg-gray-700" />
        </div>
        <div>
          <label for="price" class="block mb-1 font-medium">Price ($)</label>
          <input id="price" name="price" type="number" step="0.01" placeholder="e.g. 25000.00" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none bg-gray-50 dark:bg-gray-700" />
        </div>
        <div>
          <label for="mileage" class="block mb-1 font-medium">Mileage (km)</label>
          <input id="mileage" name="mileage" type="number" placeholder="e.g. 50000" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none bg-gray-50 dark:bg-gray-700" />
        </div>
        <div>
          <label for="fuel_type" class="block mb-1 font-medium">Fuel Type</label>
          <select id="fuel_type" name="fuel_type" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none bg-gray-50 dark:bg-gray-700">
            <option value="petrol">Petrol</option>
            <option value="diesel">Diesel</option>
            <option value="electric">Electric</option>
            <option value="hybrid">Hybrid</option>
          </select>
        </div>
        <div>
          <label for="transmission" class="block mb-1 font-medium">Transmission</label>
          <select id="transmission" name="transmission" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none bg-gray-50 dark:bg-gray-700">
            <option value="manual">Manual</option>
            <option value="automatic">Automatic</option>
          </select>
        </div>
        <div>
          <label for="condition" class="block mb-1 font-medium">Condition</label>
          <select id="condition" name="condition" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none bg-gray-50 dark:bg-gray-700">
            <option value="new">New</option>
            <option value="used">Used</option>
          </select>
        </div>
      </div>
      <div>
        <label for="description" class="block mb-1 font-medium">Description</label>
        <textarea id="description" name="description" rows="4" placeholder="Enter a brief description" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none bg-gray-50 dark:bg-gray-700"></textarea>
      </div>
      <button type="submit" class="w-full py-3 bg-primary hover:bg-indigo-700 text-white font-semibold rounded-lg shadow transition">Add Car</button>
    </form>
  </main>
</body>
</html>
