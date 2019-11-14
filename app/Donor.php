<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static where(string $string, $establishmentId)
 * @method static create(array $array)
 * @method static count()
 */
class Donor extends Model
{
    protected $fillable = [
        'establishment_id',
        'branch_id',
        'name',
        'donor_bank',
        'iban',
        'donor_account_number',
        'establishment_bank_id',
        'bank_account',
        'amount_of_withdrawal',
        'branch_id',
        'mobile',
        'phone',
        'email',
        'repeats_in_month',
        "withdraw",
        "day_of_withdraw",
        'withdraw_start_date',
        'withdraw_end_date',
        'withdraw_description',
        'success_sms',
        'failed_sms',
        'attachment',
        'approved',
    ];

    /**
     * @return BelongsTo
     */
    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }

    /**
     * @return BelongsTo
     */
    public function donorBank()
    {
        return $this->belongsTo(Bank::class, 'donor_bank');
    }

    /**
     * @return BelongsTo
     */
    public function establishmentBankAccount()
    {
        return $this->belongsTo(BankAccount::class, 'bank_account');

    }

    /**
     * @return BelongsTo
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }


    public static function getDonorsBetweenTwoDates($establishmentId, $startDate, $endDate, $bankAccount)
    {

        $donors = Donor::where('establishment_id', $establishmentId)
            //->where('withdraw_start_date', '<=' ,$startDate)
            ->where('withdraw_end_date', '>=', $startDate)
            ->where('bank_account', $bankAccount)
            ->where('withdraw', true)
            ->get();
        return $donors;
    }

    public function operation()
    {
        return $this->hasMany(Operation::class);
    }

}
