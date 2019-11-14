<?php

use Illuminate\Database\Seeder;
use App\Interval;
use Carbon\Carbon;

class IntervalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Interval::create([
            'establishment_id' => 1,
            'name' => "فترة اولى",
            'start' => Carbon::parse('2019-8-1'),
            'end' => Carbon::parse('2019-9-1'),
        ]);

        Interval::create([
            'establishment_id' => 2,
            'name' => "فترة اولى",
            'start' => Carbon::parse('2019-8-1'),
            'end' => Carbon::parse('2019-9-1'),
        ]);

        Interval::create([
            'establishment_id' => 1,
            'name' => "فترة ثانية",
            'start' => Carbon::parse('2019-9-1'),
            'end' => Carbon::parse('2019-10-1'),
        ]);

        Interval::create([
            'establishment_id' => 2,
            'name' => "فترة ثانية",
            'start' => Carbon::parse('2019-9-1'),
            'end' => Carbon::parse('2019-10-1'),
        ]);
    }
}
