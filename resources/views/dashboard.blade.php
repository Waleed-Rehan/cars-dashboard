<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cars Dashboard</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Tailwind Config for Custom Theme & Dark Mode -->
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            primary: '#4F46E5',       /* Indigo-600 */
            secondary: '#E0E7FF',     /* Indigo-100 */
          },
          fontFamily: {
            sans: ['Inter', 'ui-sans-serif', 'system-ui'],
          }
        }
      }
    }
  </script>
  <!-- Google Font: Inter -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 font-sans transition-colors duration-300">
  <!-- Header -->
  <header class="bg-white dark:bg-gray-800 shadow-sm">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
      <h1 class="text-2xl font-bold text-primary">Cars Dashboard</h1>
      <div class="flex items-center space-x-4">
        <p class="text-lg">Hello, {{ Auth::user()->name }}</p>
        <!-- Theme Toggle -->
        <button id="theme-toggle" class="p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition">
          <!-- Modern Blue Sun Icon (light mode) -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 block dark:hidden text-blue-500" fill="currentColor" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="5" />
            <path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
          </svg>
          <!-- Moon Icon (dark mode) -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden dark:block text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3a7 7 0 009.79 9.79z" />
          </svg>
        </button>
        <!-- Logout Button -->
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="py-2 px-4 bg-red-600 hover:bg-red-700 text-white rounded-lg transition">Logout</button>
        </form>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="container mx-auto py-8 px-6">
    <!-- Add Car & Search -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 space-y-4 md:space-y-0">
      <a href="/cars/create" class="inline-flex items-center bg-primary hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg shadow transform hover:-translate-y-0.5 transition">
        <span class="mr-2 text-xl">+</span> Add New Car
      </a>
      <form method="GET" action="{{ url('/cars/search') }}" class="flex flex-wrap gap-3 w-full md:w-auto">
        <input type="text" name="keyword" placeholder="Search by brand or model..." value="{{ request('keyword') }}" class="px-4 py-1.5 w-64 border border-gray-300 dark:border-gray-700 rounded-lg placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary" />
        <input type="number" name="year" placeholder="Year" class="px-4 py-1.5 w-24 border border-gray-300 dark:border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" />
        <input type="number" name="price" placeholder="Max Price" class="px-4 py-1.5 w-32 border border-gray-300 dark:border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" />
        <input type="number" name="mileage" placeholder="Max Mileage" class="px-4 py-1.5 w-40 border border-gray-300 dark:border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" />
        <select name="fuel_type"  style="color : #9d9d9d " class="px-4 py-1.5 w-32 border border-gray-300 dark:border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
          <option value="" >Fuel Type</option>
          <option value="petrol">Petrol</option>
          <option value="diesel">Diesel</option>
          <option value="electric">Electric</option>
          <option value="hybrid">Hybrid</option>
        </select>
        <select name="transmission"  style="color : #9d9d9d " class="px-4 py-1.5 w-40 border border-gray-300 dark:border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
          <option value="">Transmission</option>
          <option value="manual">Manual</option>
          <option value="automatic">Automatic</option>
        </select>
        <button type="submit" class="px-4 py-1.5 bg-green-600 hover:bg-green-700 text-white rounded-lg transition">Search</button>
      </form>
    </div>

    <!-- Success Message -->
    @if (session('success'))
      <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
        {{ session('success') }}
      </div>
    @endif

    <!-- Listings -->
    <h2 class="text-xl font-semibold mb-4">Car Listings</h2>
    @if ($cars->isEmpty())
      <p>No cars have been added yet.</p>
    @else
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($cars as $car)
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md hover:shadow-xl transition transform hover:scale-105 p-6 flex flex-col">
          <a href="{{ route('cars.show', $car->id) }}" class="flex-1">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-1">{{ $car->brand }} {{ $car->model }}</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $car->year }}</p>
            <p class="text-primary font-bold text-lg mt-2">${{ number_format($car->price) }}</p>
          </a>
          <div class="mt-4 flex space-x-2 justify-center">
            <a href="{{ route('cars.edit', $car->id) }}" class="p-2 bg-secondary dark:bg-gray-700 rounded-full hover:bg-primary hover:text-white transition" title="Edit">
              <!-- Paintbrush Icon -->
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M18.828 2.586a2 2 0 00-2.828 0L8.658 9.928l-4.243 4.242-1.414 1.415a1 1 0 000 1.414l2.121 2.121a1 1 0 001.414 0l1.415-1.414 4.242-4.243 7.342-7.342a2 2 0 000-2.828z" />
              </svg>
            </a>
            <form action="{{ route('cars.destroy', $car->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this car?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="p-2 bg-secondary dark:bg-gray-700 rounded-full hover:bg-red-600 hover:text-white transition" title="Delete">
                <!-- Trash Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M6 3a1 1 0 011-1h6a1 1 0 011 1v1h3a1 1 0 110 2h-1v10a2 2 0 01-2 2H6 a2 2 0 01-2-2V6 H3 a1 1 0 110-2 h3 V3 z M8 6 v10 h1 V6 H8 zm3 0 v10 h1 V6 h-1 z" clip-rule="evenodd" />
                </svg>
              </button>
            </form>
          </div>
        </div>
        @endforeach
      </div>

      <!-- Pagination -->
      @if ($cars->hasPages())
      <nav class="mt-8 flex justify-center">
        <ul class="inline-flex -space-x-px">
          {{-- Previous Page Link --}}
          @if ($cars->onFirstPage())
          <li>
            <span class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg">Previous</span>
          </li>
          @else
          <li>
            <a href="{{ $cars->previousPageUrl() }}" class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700">Previous</a>
          </li>
          @endif

          {{-- Pagination Elements --}}
          @foreach (range(1, $cars->lastPage()) as $page)
              @if ($page == $cars->currentPage())
                  <li>
                      <span class="px-3 py-2 leading-tight bg-primary text-white border border-gray-300">{{ $page }}</span>
                  </li>
              @else
                  <li>
                      <a href="{{ $cars->url($page) }}" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">{{ $page }}</a>
                  </li>
              @endif
          @endforeach

          {{-- Next Page Link --}}
          @if ($cars->hasMorePages())
          <li>
            <a href="{{ $cars->nextPageUrl() }}" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700">Next</a>
          </li>
          @else
          <li>
            <span class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg">Next</span>
          </li>
          @endif
        </ul>
      </nav>
      @endif
    @endif
  </main>

  <!-- Dark Mode Toggle Script -->
  <script>
    const toggle = document.getElementById('theme-toggle');
    const htmlEl = document.documentElement;
    toggle.addEventListener('click', () => {
      htmlEl.classList.toggle('dark');
    });
  </script>
</body>
</html>
