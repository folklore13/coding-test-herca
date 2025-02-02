<?php

namespace Database\Seeders;

use App\Models\Penjualan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "marketing_id" => 1,
                "date" => "2023-05-22",
                "cargo_fee" => 25000,
                "total_balance" => 3000000,
            ],
            [
                "marketing_id" => 3,
                "date" => "2023-05-22",
                "cargo_fee" => 25000,
                "total_balance" => 320000,
            ],
            [
                "marketing_id" => 1,
                "date" => "2023-05-22",
                "cargo_fee" => 0,
                "total_balance" => 65000000,
            ],
            [
                "marketing_id" => 1,
                "date" => "2023-05-23",
                "cargo_fee" => 10000,
                "total_balance" => 70000000,
            ],
            [
                "marketing_id" => 2,
                "date" => "2023-05-23",
                "cargo_fee" => 10000,
                "total_balance" => 80000000,
            ],
            [
                "marketing_id" => 3,
                "date" => "2023-05-23",
                "cargo_fee" => 12000,
                "total_balance" => 44000000,
            ],
            [
                "marketing_id" => 1,
                "date" => "2023-06-01",
                "cargo_fee" => 0,
                "total_balance" => 75000000,
            ],
            [
                "marketing_id" => 2,
                "date" => "2023-06-02",
                "cargo_fee" => 0,
                "total_balance" => 85000000,
            ],
            [
                "marketing_id" => 2,
                "date" => "2023-06-01",
                "cargo_fee" => 0,
                "total_balance" => 175000000,
            ],
            [
                "marketing_id" => 3,
                "date" => "2023-06-01",
                "cargo_fee" => 0,
                "total_balance" => 75000000,
            ],
            [
                "marketing_id" => 2,
                "date" => "2023-06-01",
                "cargo_fee" => 0,
                "total_balance" => 750020000,
            ],
            [
                "marketing_id" => 3,
                "date" => "2023-06-01",
                "cargo_fee" => 0,
                "total_balance" => 130000000,
            ],
        ];

        
        foreach($data as $key => $value){
            Penjualan::create($value);
        }
    }
}
