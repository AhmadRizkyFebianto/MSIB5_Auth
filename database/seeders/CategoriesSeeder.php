<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = new Categories();
        $category->name_categories = 'Hp';
        $category->save();

        $category = new Categories();
        $category->name_categories = 'Canon';
        $category->save();

        $category = new Categories();
        $category->name_categories = 'Epson';
        $category->save();

        $category = new Categories();
        $category->name_categories = 'Brother';
        $category->save();
    }
}
