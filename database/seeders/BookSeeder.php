<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'description' => 'A classic American novel about the Jazz Age',
                'price' => 12.99,
                'availability' => true,
                'category_id' => Category::where('name', 'Fiction')->first()->id,
            ],
            [
                'title' => 'Dune',
                'author' => 'Frank Herbert',
                'description' => 'Epic science fiction novel set in a distant future',
                'price' => 15.99,
                'availability' => true,
                'category_id' => Category::where('name', 'Science Fiction')->first()->id,
            ],
            [
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'description' => 'A handbook of agile software craftsmanship',
                'price' => 29.99,
                'availability' => true,
                'category_id' => Category::where('name', 'Technology')->first()->id,
            ],
            [
                'title' => 'Steve Jobs',
                'author' => 'Walter Isaacson',
                'description' => 'Biography of Apple co-founder Steve Jobs',
                'price' => 19.99,
                'availability' => true,
                'category_id' => Category::where('name', 'Biography')->first()->id,
            ],
            [
                'title' => 'Sapiens',
                'author' => 'Yuval Noah Harari',
                'description' => 'A brief history of humankind',
                'price' => 16.99,
                'availability' => false,
                'category_id' => Category::where('name', 'History')->first()->id,
            ],
            [
                'title' => 'Educated',
                'author' => 'Tara Westover',
                'description' => 'A memoir about education and family',
                'price' => 14.99,
                'availability' => true,
                'category_id' => Category::where('name', 'Non-Fiction')->first()->id,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
