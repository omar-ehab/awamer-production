<?php

use Illuminate\Database\Seeder;
use App\Bank;

class BanksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bank::create([
            'name' => 'الأهلي',
            'amount_col'=>'0',
            'donation_date_col'=>'1',
            'bank_account_number_col'=>'2',
        ]);

        Bank::create([
            'name' => 'الراجحي',
            'amount_col'=>'0',
            'donation_date_col'=>'1',
            'bank_account_number_col'=>'2',
        ]);

        Bank::create([
            'name' => 'الوطني السعودي',
            'amount_col'=>'0',
            'donation_date_col'=>'1',
            'bank_account_number_col'=>'2',
        ]);

        Bank::create([
            'name' => 'CIB',
            'amount_col'=>'0',
            'donation_date_col'=>'1',
            'bank_account_number_col'=>'2',
        ]);
    }
}
