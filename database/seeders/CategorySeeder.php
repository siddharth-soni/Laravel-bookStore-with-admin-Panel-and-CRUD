<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Fiction', 'description' => 'Fictional books and novels'],
            ['name' => 'Non-Fiction', 'description' => 'Non-fictional books and educational content'],
            ['name' => 'Science Fiction', 'description' => 'Science fiction and fantasy books'],
            ['name' => 'Biography', 'description' => 'Biographies and autobiographies'],
            ['name' => 'Technology', 'description' => 'Technology and programming books'],
            ['name' => 'History', 'description' => 'Historical books and documentation'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
