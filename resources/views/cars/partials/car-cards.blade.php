@if ($cars->isEmpty())
    <p>No cars have been added yet.</p>
@else
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($cars as $car)
            <div class="relative flex flex-col items-center justify-between bg-white shadow hover:shadow-lg transition rounded-full w-64 h-64 p-6 text-center mx-auto border hover:ring-2 hover:ring-blue-400 group">
                <a href="{{ route('cars.show', $car->id) }}" class="flex-1 flex flex-col items-center justify-center">
                    <div class="text-xl font-semibold text-gray-800 group-hover:text-blue-700">{{ $car->brand }} {{ $car->model }}</div>
                    <div class="text-sm text-gray-500">{{ $car->year }}</div>
                    <div class="text-green-600 font-bold text-md mt-1">${{ number_format($car->price) }}</div>
                </a>

                <div class="mt-4 flex space-x-2">
                    <a href="{{ route('cars.edit', $car->id) }}"
                       class="w-9 h-9 bg-yellow-500 text-white flex items-center justify-center rounded-full shadow hover:bg-yellow-600 transition"
                       title="Edit">✏️</a>

                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this car?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="w-9 h-9 bg-red-500 text-white flex items-center justify-center rounded-full shadow hover:bg-red-600 transition"
                                title="Delete">🗑️</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-8 flex justify-center">
        {{ $cars->links() }}
    </div>
@endif
