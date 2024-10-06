<?php

namespace Database\Seeders;

use App\Modules\City\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::newFactory()->count(10)->create();
    }
}
