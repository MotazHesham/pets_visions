<?php

namespace Database\Seeders;

use App\Models\Clinic;
use App\Models\Hosting;
use App\Models\PetCompanion;
use App\Models\Product; 
use App\Models\Store;
use Illuminate\Database\Seeder;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Store::factory(6)->withMedia()->create();
        Product::factory(12)->withMedia()->create();
        Clinic::factory(12)->withMedia()->create();
        Hosting::factory(6)->withMedia()->create();
        PetCompanion::factory(6)->withMedia()->create();
        $this->call([
            SliderSeeder::class
        ]);
    }
}
