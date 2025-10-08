<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title>Car Details</title>

  <!-- Tailwind + Custom Config -->
  <script>
    tailwind.config = {
      darkMode: false,  /* Light-mode only */
      theme: {
        extend: {
          colors: {
            primary: '#4F46E5',   /* Indigo-600 */
            secondary: '#E0E7FF', /* Indigo-100 */
          },
          fontFamily: {
            sans: ['Inter','ui-sans-serif','system-ui'],
          },
        }
      }
    }
  </script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>
</head>

<body class="min-h-screen bg-gray-50 text-gray-800 font-sans">

  <!-- Header (matches dashboard) -->
  <header class="bg-white shadow-sm">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
      <h1 class="text-2xl font-bold text-primary">Car Details</h1>
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

  <!-- Details Card -->
  <main class="container mx-auto px-6 py-12">
    <div class="max-w-md mx-auto bg-white rounded-2xl shadow-md overflow-hidden">
      <div class="px-6 py-8">
        <h2 class="flex items-center gap-2 text-3xl font-bold text-gray-900 mb-6">
          🚘 {{ $car->brand }} {{ $car->model }}
        </h2>

        <ul class="space-y-4">
          <li class="flex items-center">
            <span class="mr-3 text-xl">📅</span>
            <span class="font-medium w-28">Year:</span>
            <span>{{ $car->year }}</span>
          </li>
          <li class="flex items-center">
            <span class="mr-3 text-xl">💲</span>
            <span class="font-medium w-28">Price:</span>
            <span>${{ number_format($car->price) }}</span>
          </li>
          <li class="flex items-center">
            <span class="mr-3 text-xl">📏</span>
            <span class="font-medium w-28">Mileage:</span>
            <span>{{ number_format($car->mileage) }} km</span>
          </li>
          <li class="flex items-center">
            <span class="mr-3 text-xl">⛽</span>
            <span class="font-medium w-28">Fuel:</span>
            <span>{{ ucfirst($car->fuel_type) }}</span>
          </li>
          <li class="flex items-center">
            <span class="mr-3 text-xl">⚙️</span>
            <span class="font-medium w-28">Trans:</span>
            <span>{{ ucfirst($car->transmission) }}</span>
          </li>
          <li class="flex items-center">
            <span class="mr-3 text-xl">🆕</span>
            <span class="font-medium w-28">Condition:</span>
            <span>{{ ucfirst($car->condition) }}</span>
          </li>
          <li class="flex items-start">
            <span class="mr-3 text-xl">📝</span>
            <span class="font-medium w-28">Desc:</span>
            <span>{{ $car->description ?? 'N/A' }}</span>
          </li>
        </ul>
      </div>

      <div class="px-6 py-4 bg-gray-100 flex justify-center">
        <a href="{{ url()->previous() }}"
           class="inline-flex items-center px-5 py-2 bg-green-400 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow transition">
          Back 
        </a>
      </div>
    </div>
  </main>

</body>
</html>
