<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city01['name'] = 'Sana\'a';
        City::create($city01);

        $city02['name'] = 'Tize';
        City::create($city02);

        $city03['name'] = 'Aden';
        City::create($city03);

        $city04['name'] = 'Headrmoot';
        City::create($city04);

        $city05['name'] = 'Aeb';
        City::create($city05);

        $city06['name'] = 'Thamar';
        City::create($city06);

        $city07['name'] = 'Al-Mokala';
        City::create($city07);

        $city08['name'] = 'Marib';
        City::create($city08);

        $city09['name'] = 'Amran';
        City::create($city09);

        $city10['name'] = 'Sayoon';
        City::create($city10);
    }
}
