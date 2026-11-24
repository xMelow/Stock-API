<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $warehouse = Location::create(['name' => 'Warehouse']);
        $shop = Location::create(['name' => 'Shop']);
        $products = [
            ['sku' => 'LBL-100', 'name' => 'Label roll 100x50', 'price' => 12.50],
            ['sku' => 'LBL-200', 'name' => 'Label roll 100x150', 'price' => 18.90],
            ['sku' => 'RIB-110', 'name' => 'Thermal ribbon 110mm', 'price' => 9.75],
            ['sku' => 'SCN-001', 'name' => 'Barcode scanner', 'price' => 149.00],
        ];

        foreach ($products as $productData) {
            $product = Product::create($productData);
            $product->stockItems()->createMany([
                ['location_id' => $warehouse->id, 'quantity' => 5],
                ['location_id' => $shop->id, 'quantity' => 50],
            ]);
        }
    }
}
