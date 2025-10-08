<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;


class CarController extends Controller
{
    public function dashboard()
    {
        $cars = Car::orderBy('created_at', 'desc')->paginate(8);
        // or any number per page

        return view('dashboard', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'price' => 'required|numeric|min:0',
            'mileage' => 'required|integer|min:0',
            'fuel_type' => 'required|in:petrol,diesel,electric,hybrid',
            'transmission' => 'required|in:manual,automatic',
            'condition' => 'required|in:new,used',
            'description' => 'nullable|string',
        ]);

        Car::create($validated);

        return redirect('/dashboard')->with('success', 'Car added successfully!');
    }

    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'price' => 'required|numeric|min:0',
            'mileage' => 'required|integer|min:0',
            'fuel_type' => 'required|in:petrol,diesel,electric,hybrid',
            'transmission' => 'required|in:manual,automatic',
            'condition' => 'required|in:new,used',
            'description' => 'nullable|string',
        ]);

        $car->update($validated);

        return redirect('/dashboard')->with('success', 'Car updated successfully!');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect('/dashboard')->with('success', 'Car deleted successfully!');
    }


    public function search(Request $request)
    {
        $hasFilters = $request->filled('keyword') ||
                      $request->filled('year') ||
                      $request->filled('price') ||
                      $request->filled('mileage') ||
                      $request->filled('fuel_type') ||
                      $request->filled('transmission');
    
        if (!$hasFilters) {
            return view('cars.search-results', [
                'cars' => collect(), // empty collection
                'message' => 'Please enter a search term or filter to begin.'
            ]);
        }
    
        $query = Car::query();
    
        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('brand', 'like', '%' . $request->keyword . '%')
                  ->orWhere('model', 'like', '%' . $request->keyword . '%');
            });
        }
    
        if ($request->filled('year')) {
            $query->where('year', $request->year);
        }
    
        if ($request->filled('price')) {
            $query->where('price', '<=', $request->price);
        }
    
        if ($request->filled('mileage')) {
            $query->where('mileage', '<=', $request->mileage);
        }
    
        if ($request->filled('fuel_type')) {
            $query->where('fuel_type', $request->fuel_type);
        }
    
        if ($request->filled('transmission')) {
            $query->where('transmission', $request->transmission);
        }
    
        $cars = $query->paginate(5); // 10 results per page

    
        return view('cars.search-results', compact('cars'));
    }
    
    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('cars.show', compact('car'));
    }
    
}
