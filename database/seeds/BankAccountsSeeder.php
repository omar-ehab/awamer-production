<?php

use Illuminate\Database\Seeder;
use App\BankAccount;

class BankAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BankAccount::create([
            'establishment_id' => 1,
            'bank_id' => 1,
            'account_number' => 4765872345236745,
            'iban' => "SA1234567891234567891234",
        ]);

        BankAccount::create([
            'establishment_id' => 2,
            'bank_id' => 2,
            'account_number' => 4765872345236745,
            'iban' => "SA9876543219876543216547",
        ]);
    }
}
