<?php

use Illuminate\Database\Seeder;
use App\Establishment;
use App\Contract;

class EstablishmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $est = Establishment::create([
            'establishment_type_id' => 1,
            'administrative_area_id' => 1,
            'name' => 'مؤسسة خيرية 1',
            'representative_name' => 'الأستاذ احمد',
            'mobile' => '123456789123',
            'address' => 'test address 1'
        ]);
        Contract::create([
            'establishment_id' =>$est->id,
            'percentage' => true,
            'value' => 15
        ]);

        $est2 = Establishment::create([
            'establishment_type_id' => 1,
            'administrative_area_id' => 1,
            'name' => 'مؤسسة خيرية 2',
            'representative_name' => 'الأستاذ محمد',
            'mobile' => '987654321987',
            'address' => 'test address 2'
        ]);
        Contract::create([
            'establishment_id' =>$est2->id,
            'percentage' => false,
            'value' => 250
        ]);
    }
}
