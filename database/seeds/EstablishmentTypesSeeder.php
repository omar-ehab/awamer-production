<?php

use Illuminate\Database\Seeder;
use App\EstablishmentType;

class EstablishmentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EstablishmentType::create([
            'name' => 'نوع الجهة الأول'
        ]);
    }
}
