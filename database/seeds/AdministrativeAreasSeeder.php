<?php

use Illuminate\Database\Seeder;
use App\AdministrativeArea;

class AdministrativeAreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdministrativeArea::create([
            'name' => 'المنطقة الأدارية الأولي'
        ]);
    }
}
