<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategory::insert([
            ['name' => 'كلاب'],
            ['name' => 'قطط'],
            ['name' => 'طيور'],
            ['name' => 'زواحف'],
        ]);
    }
}
