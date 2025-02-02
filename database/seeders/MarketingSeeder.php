<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Marketing;

class MarketingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ["Alfandy", "Mery", "Danang"];

        foreach($data as $key => $value){
            Marketing::create([
                "name" => $value
            ]);
        }
    }
}
