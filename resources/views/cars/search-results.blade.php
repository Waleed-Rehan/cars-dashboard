<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title>Search Results</title>

  <!-- Tailwind + Custom Config -->  
  <script>
    tailwind.config = {
      darkMode: false,
      theme: {
        extend: {
          colors: {
            primary: '#4F46E5',    /* Indigo-600 */
            secondary: '#E0E7FF',  /* Indigo-100 */
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

  <!-- Header -->
  <header class="bg-white shadow-sm">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
      <h1 class="text-2xl font-bold text-primary flex items-center gap-2">
        🔍 Search Results
      </h1>
      <a href="/dashboard"
      class="inline-flex items-center space-x-2 px-4 py-2 border border-indigo-200 bg-white text-indigo-600 font-medium rounded-full hover:bg-indigo-50 hover:border-indigo-300 hover:text-indigo-700 transition shadow-sm">
     
     <!-- Sharper Arrow Icon -->
     <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
     </svg>
   
     <span>Dashboard</span>
   </a>
   
    </div>
  </header>

  <!-- Main -->
  <main class="container mx-auto px-6 py-8">
    @if(isset($message))
      <div class="bg-yellow-100 border border-yellow-300 text-yellow-800 rounded-lg p-6 text-center mb-6">
        {{ $message }}
      </div>
    @elseif($cars->isEmpty())
      <div class="bg-red-100 border border-red-300 text-red-800 rounded-lg p-6 text-center mb-6">
        No cars matched your search.
      </div>
    @else
      <div class="overflow-x-auto bg-white rounded-2xl shadow-lg">
        <table class="w-full divide-y divide-gray-200">
          <thead class="bg-secondary">
            <tr>
              <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase">Brand</th>
              <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase">Model</th>
              <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase">Year</th>
              <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase">Price</th>
              <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase">Mileage</th>
              <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase">Fuel</th>
              <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase">Transmission</th>
              <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase">Condition</th>
              <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700 uppercase">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            @foreach($cars as $car)
            <tr class="hover:bg-gray-100 transition">
              <td class="px-6 py-4">{{ $car->brand }}</td>
              <td class="px-6 py-4">{{ $car->model }}</td>
              <td class="px-6 py-4">{{ $car->year }}</td>
              <td class="px-6 py-4">${{ number_format($car->price) }}</td>
              <td class="px-6 py-4">{{ number_format($car->mileage) }} km</td>
              <td class="px-6 py-4">{{ ucfirst($car->fuel_type) }}</td>
              <td class="px-6 py-4">{{ ucfirst($car->transmission) }}</td>
              <td class="px-6 py-4">{{ ucfirst($car->condition) }}</td>
              <td class="px-6 py-4 text-center">
                <div class="inline-flex space-x-2">
                  <a href="{{ route('cars.edit', $car->id) }}"
                    class="w-9 h-9 bg-secondary rounded-full flex items-center justify-center hover:bg-sky-200 hover:text-white transition"title="Edit">🖌️</a>
                 
                  <form action="{{ route('cars.destroy', $car->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this car?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="w-9 h-9 bg-secondary rounded-full flex items-center justify-center hover:bg-red-400 hover:text-white transition"
                            title="Delete">
                      🗑️
                    </button>
                  </form>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="mt-6 flex justify-center">
        {{ $cars->withQueryString()->links() }}
      </div>

      <!-- Back to Dashboard Button -->
      <div class="mt-8 flex justify-center">
        <a href="/dashboard"
           class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-full shadow-lg transition">
          🏠 Back to Dashboard
        </a>
      </div>
    @endif
  </main>

</body>
</html>
