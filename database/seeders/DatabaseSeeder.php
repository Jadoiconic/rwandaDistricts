<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Region;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $json = file_get_contents("data.json");
        $data = json_decode($json, true)['provinces'];

        foreach ($data as $provinceData) {
            foreach ($provinceData['districts'] as $district) {
                $province = new Region();
                $province->province = $provinceData['name'];
                $province->district = $district;
                $province->save();
            }
        }
    }
    
}
