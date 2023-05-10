<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data = [
            ['name' => 'Pieczywo'],
            ['name' => 'Przekąski'],
            ['name' => 'Nabiał'],
            ['name' => 'Mięso'],
            ['name' => 'Napoje']
       ];
       ProductCategory::insert($data)
    }
}
