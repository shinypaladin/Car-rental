<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cars')->insert([
            [
                'brand' => 'Dacia',
                'model' => 'Logan',
                'category' => 'Economy',
                'seats' => 5,
                'transmission' => 'Manual',
                'ac' => true,
                'quantity' => 5,
                'allow_overbooking' => false,
                'base_price' => 350.00,
                'image_path' => '/images/dacia_logan.jpg',
                'video_path' => '/videos/dacia_logan.mp4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Hyundai',
                'model' => 'Tucson',
                'category' => 'SUV',
                'seats' => 5,
                'transmission' => 'Automatic',
                'ac' => true,
                'quantity' => 3,
                'allow_overbooking' => true,
                'base_price' => 550.00,
                'image_path' => '/images/hyundai_tucson.jpg',
                'video_path' => '/videos/hyundai_tucson.mp4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Volkswagen',
                'model' => 'T-Roc',
                'category' => 'Economy',
                'seats' => 5,
                'transmission' => 'Automatic',
                'ac' => true,
                'quantity' => 2,
                'allow_overbooking' => false,
                'base_price' => 650.00,
                'image_path' => '/images/vw_troc.jpg',
                'video_path' => '/videos/vw_troc.mp4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand' => 'Mercedes',
                'model' => 'Vito',
                'category' => 'Van',
                'seats' => 9,
                'transmission' => 'Automatic',
                'ac' => true,
                'quantity' => 2,
                'allow_overbooking' => false,
                'base_price' => 900.00,
                'image_path' => '/images/mercedes_vito.jpg',
                'video_path' => '/videos/mercedes_vito.mp4',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // Add some mock seasonal prices
        DB::table('seasonal_prices')->insert([
            [
                'car_id' => null, // applies to all cars
                'name' => 'Summer High Season',
                'start_date' => date('Y') . '-06-01',
                'end_date' => date('Y') . '-08-31',
                'adjustment_type' => 'percentage',
                'value' => 1.30, // +30% price markup
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'car_id' => 1, // Dacia Logan specific christmas discount
                'name' => 'Winter Special Logan',
                'start_date' => date('Y') . '-12-01',
                'end_date' => date('Y') . '-12-25',
                'adjustment_type' => 'flat_rate',
                'value' => 280.00, // Fixed override rate
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
