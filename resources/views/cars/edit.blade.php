<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title>Edit Car — {{ $car->brand }} {{ $car->model }}</title>

  <!-- Tailwind + Custom Config -->
  <script>
    tailwind.config = {
      darkMode: false,
      theme: {
        extend: {
          colors: {
            primary: '#4F46E5',
            secondary: '#E0E7FF',
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
        ✏️ Edit Car
      </h1>
      <a href="{{ url()->previous() }}"
         class="inline-flex items-center space-x-1 px-3 py-1.5 bg-green-200 hover:bg-green-500 text-gray-800 rounded-lg transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1">
        <span class="text-xl">←</span><span>Back</span>
      </a>
    </div>
  </header>

  <!-- Form -->
  <main class="container mx-auto px-6 py-12 max-w-2xl">
    @if ($errors->any())
      <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-lg">
        <ul class="list-disc list-inside space-y-1">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="/cars/{{ $car->id }}" method="POST"
          class="bg-white rounded-2xl shadow-md p-6 space-y-6">
      @csrf
      @method('PUT')

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="flex flex-col">
          <label for="brand" class="mb-1 font-medium">Brand</label>
          <input id="brand" name="brand" type="text" value="{{ $car->brand }}"
                 class="w-full px-3 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none bg-gray-50"/>
        </div>
        <div class="flex flex-col">
          <label for="model" class="mb-1 font-medium">Model</label>
          <input id="model" name="model" type="text" value="{{ $car->model }}"
                 class="w-full px-3 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none bg-gray-50"/>
        </div>
        <div class="flex flex-col">
          <label for="year" class="mb-1 font-medium">Year</label>
          <input id="year" name="year" type="number" value="{{ $car->year }}"
                 class="w-full px-3 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none bg-gray-50"/>
        </div>
        <div class="flex flex-col">
          <label for="price" class="mb-1 font-medium">Price ($)</label>
          <input id="price" name="price" type="number" step="0.01" value="{{ $car->price }}"
                 class="w-full px-3 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none bg-gray-50"/>
        </div>
        <div class="flex flex-col">
          <label for="mileage" class="mb-1 font-medium">Mileage (km)</label>
          <input id="mileage" name="mileage" type="number" value="{{ $car->mileage }}"
                 class="w-full px-3 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none bg-gray-50"/>
        </div>
        <div class="flex flex-col">
          <label for="fuel_type" class="mb-1 font-medium">Fuel Type</label>
          <select id="fuel_type" name="fuel_type"
                  class="w-full px-3 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none bg-gray-50">
            @foreach(['petrol','diesel','electric','hybrid'] as $opt)
              <option value="{{ $opt }}" @if($car->fuel_type==$opt) selected @endif>
                {{ ucfirst($opt) }}
              </option>
            @endforeach
          </select>
        </div>
        <div class="flex flex-col">
          <label for="transmission" class="mb-1 font-medium">Transmission</label>
          <select id="transmission" name="transmission"
                  class="w-full px-3 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none bg-gray-50">
            @foreach(['manual','automatic'] as $opt)
              <option value="{{ $opt }}" @if($car->transmission==$opt) selected @endif>
                {{ ucfirst($opt) }}
              </option>
            @endforeach
          </select>
        </div>
        <div class="flex flex-col">
          <label for="condition" class="mb-1 font-medium">Condition</label>
          <select id="condition" name="condition"
                  class="w-full px-3 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none bg-gray-50">
            @foreach(['new','used'] as $opt)
              <option value="{{ $opt }}" @if($car->condition==$opt) selected @endif>
                {{ ucfirst($opt) }}
              </option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="flex flex-col">
        <label for="description" class="mb-1 font-medium">Description (optional)</label>
        <textarea id="description" name="description" rows="4"
                  class="w-full px-3 py-1.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:outline-none bg-gray-50">{{ $car->description }}</textarea>
      </div>

      <button type="submit"
              class="w-full py-3 bg-indigo-700  hover:bg-indigo-300 text-white font-semibold rounded-lg shadow transition">
        Update Car
      </button>
    </form>
  </main>
</body>
</html>
