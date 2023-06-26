<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $newId = Package::max('id') + 1;
        DB::table('packages')->insert([
            [
                'id' => 1,
                'name' => 'Paket 1 (Nasi, Ayam Goreng, Fruit Tea)',
                'price' => 20000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Paket 2 (Nasi, Telur, Sayur, Teh)',
                'price' => 15000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Paket 3 (Nasi, Tempe, Tahu, Air Putih)',
                'price' => 10000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Paket 4 (Nasi, Ayam Bakar, Sayur, Teh)',
                'price' => 22000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
