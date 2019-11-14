<?php

namespace App\Imports;

use App\Operation;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
/*
HeadingRowFormatter::default('none');
*/


class ImportOperations  implements ToModel, WithStartRow ,WithMappedCells
{

    public function mapping(): array
    {
        return [
            'establishment_id'   => 'A1',
            'donor_id'           => 'B9',
            'interval_id'        => 'C9',
            'bank_account_id'    => 'D9',
            'success'            => 'E9',
            'amount'             => 'F9',
        ];
    }




    public  function model(array $row)
    {
        dd($row);
        return new Operation([
            'establishment_id'     => $row['establishment_id'],
            'donor_id'    => $row['donor_id'],
            'interval_id' => $row['interval_id'],
            'success' => $row['success'],
            'amount' => $row['amount'],
            'bank_account_id' => $row['bank_account_id'],
        ]);
    }

     public function startRow(): int
    {
        return 1;
    }



    /*public function startRow(): int
    {
        return 2;
    }*/

   /*  public function batchSize(): int
    {
        return 1000;
    }
*/



}
