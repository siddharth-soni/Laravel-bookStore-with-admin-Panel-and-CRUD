<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        // Get featured books (latest 6 available books)
        $featuredBooks = Book::with('category')
            ->where('availability', true)
            ->latest()
            ->take(6)
            ->get();

        // Get all categories
        $categories = Category::withCount('books')->get();

        // Get weather data for demo (OpenWeatherMap API)
        $weather = $this->getWeatherData();

        return view('home', compact('featuredBooks', 'categories', 'weather'));
    }

    private function getWeatherData()
    {
        try {
            $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
                'q' => 'Jabalpur,IN', // <- Changed city and country code
                'appid' => 'demo', // <- Replace with your actual API key
                'units' => 'metric'
            ]);

            if ($response->successful()) {
                return $response->json();
            }
        } catch (\Exception $e) {
            // Log the error if needed
        }

        // Fallback mock data for Jabalpur
        return [
            'name' => 'Jabalpur',
            'main' => ['temp' => 30, 'humidity' => 60],
            'weather' => [['main' => 'Clear', 'description' => 'clear sky']]
        ];
    }

}
