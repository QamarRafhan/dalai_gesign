<?php

namespace App\Imports;

use App\Models\UserOperation;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersOperationImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = new UserOperation([
            "ID_user" => $row['ID_user'],
            "ID_fund" => $row['ID_fund'],
            "amount" => $row['amount'],
            "currency" => $row['currency'],
            "role_id" => 2, // User Type User
            "status" => 1,
            "password" => Hash::make('password')
        ]);

        // Delete Any Existing Role
        DB::table('model_has_roles')->where('model_id',$user->id)->delete();
            
        // Assign Role To User
        $user->assignRole($user->role_id);

        return $user;
    }
}
