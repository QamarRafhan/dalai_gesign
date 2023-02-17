<?php

namespace App\Imports;

use App\Models\UserOperation;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersOperationImport implements ToModel , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $useroperation = new UserOperation([
            "id_user" => $row['id_user'],
            "id_fund" => $row['id_fund'],
            "amount" => $row['amount'],
            "currency" => $row['currency'],
            "amount_eur" =>$row['amount_eur'], 
            "amount_tokens" =>$row['amount_tokens'], 
            "date_unblock" =>$row['date_unblock'],
            "status" =>$row['status'],
            "comments" =>$row['comments'],
        ]);

        // Delete Any Existing Role
       
            
        // Assign Role To User


        return $useroperation;
    }
}
