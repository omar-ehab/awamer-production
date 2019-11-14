<?php

use Illuminate\Database\Seeder;
use App\Donor;
use Carbon\Carbon;

class DonorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */



    public function run()
    {
        $names = ["متبرع 1", "متبرع 2", "متبرع 3"];
        $accountNumbers = [123456789, 987654321, 654987321];
        $bankAccounts = [1, 2, 1];
        $amountOfWithdrawal = [1265, 570, 768];
        $mobiles = [123456789123, 987654321987, 654321987456];
        $emails = ["test1@test.com", "test2@test.com", "test3@test.com"];
        $startDate = ["2019-8-1", "2019-8-10", "2019-9-1"];
        $endDate = ["2019-9-15", "2019-9-1", "2019-10-1"];
        $daysOfWithdraw = [1, 13, 24];

        for($i = 0; $i < 3; $i++)
        {
            Donor::create([
                'establishment_id' => 1,
                'name' => $names[$i],
                'donor_bank' => 1,
                'iban' => "SA1234567891234567891234",
                'donor_account_number' => $accountNumbers[$i],
                'bank_account' => $bankAccounts[$i],
                'amount_of_withdrawal' => $amountOfWithdrawal[$i],
                'day_of_withdraw' => $daysOfWithdraw[$i],
                'mobile' => $mobiles[$i],
                'email' => $emails[$i],
                'repeats_in_month' => 1,
                'withdraw' => true,
                'withdraw_start_date' => Carbon::parse($startDate[$i]),
                'withdraw_end_date' => Carbon::parse($endDate[$i]),
                'success_sms' => true,
                'failed_sms' => true
            ]);
        }
    }
}
