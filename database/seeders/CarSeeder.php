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
                'brand'            => 'Dacia',
                'model'            => 'Logan Diesel',
                'category'         => 'Economy',
                'seats'            => 5,
                'transmission'     => 'Manual',
                'ac'               => true,
                'quantity'         => 2,
                'allow_overbooking'=> true,
                'base_price'       => 250.00,
                'display_order'    => 1,
                'image_path'       => '/images/dacia_logan.jpg',
                'video_path'       => '/videos/dacia_logan.mp4',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'brand'            => 'Renault',
                'model'            => 'Clio 5 Petrol Auto',
                'category'         => 'Economy',
                'seats'            => 5,
                'transmission'     => 'Automatic',
                'ac'               => true,
                'quantity'         => 1,
                'allow_overbooking'=> true,
                'base_price'       => 300.00,
                'display_order'    => 2,
                'image_path'       => '/images/clio5.jpg',
                'video_path'       => null,
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'brand'            => 'Renault',
                'model'            => 'Clio 5 Diesel Manual',
                'category'         => 'Economy',
                'seats'            => 5,
                'transmission'     => 'Manual',
                'ac'               => true,
                'quantity'         => 4,
                'allow_overbooking'=> true,
                'base_price'       => 300.00,
                'display_order'    => 3,
                'image_path'       => '/images/clio5.jpg',
                'video_path'       => null,
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'brand'            => 'Volkswagen',
                'model'            => 'T-Roc Diesel',
                'category'         => 'Economy',
                'seats'            => 5,
                'transmission'     => 'Automatic',
                'ac'               => true,
                'quantity'         => 3,
                'allow_overbooking'=> true,
                'base_price'       => 500.00,
                'display_order'    => 4,
                'image_path'       => '/images/vw_troc.jpg',
                'video_path'       => '/videos/vw_troc.mp4',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'brand'            => 'Audi',
                'model'            => 'Q3 Diesel',
                'category'         => 'SUV',
                'seats'            => 5,
                'transmission'     => 'Automatic',
                'ac'               => true,
                'quantity'         => 1,
                'allow_overbooking'=> false,
                'base_price'       => 1200.00,
                'display_order'    => 5,
                'image_path'       => '/images/audi_q3.jpg',
                'video_path'       => null,
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'brand'            => 'Volkswagen',
                'model'            => 'Touareg Diesel',
                'category'         => 'SUV',
                'seats'            => 5,
                'transmission'     => 'Automatic',
                'ac'               => true,
                'quantity'         => 1,
                'allow_overbooking'=> false,
                'base_price'       => 1900.00,
                'display_order'    => 6,
                'image_path'       => '/images/vw_touareg.jpg',
                'video_path'       => null,
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'brand'            => 'Porsche',
                'model'            => 'Macan Diesel',
                'category'         => 'Luxury',
                'seats'            => 5,
                'transmission'     => 'Automatic',
                'ac'               => true,
                'quantity'         => 1,
                'allow_overbooking'=> false,
                'base_price'       => 2400.00,
                'display_order'    => 7,
                'image_path'       => '/images/porsche_macan.jpg',
                'video_path'       => null,
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
        ]);
 
        // Seasonal price: summer markup applied to all cars
        DB::table('seasonal_prices')->insert([
            [
                'car_id'          => null,
                'name'            => 'Summer High Season',
                'start_date'      => date('Y') . '-06-01',
                'end_date'        => date('Y') . '-08-31',
                'adjustment_type' => 'percentage',
                'value'           => 1.30,
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
        ]);
    }
}
