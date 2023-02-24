<?php

namespace App\Imports;

use App\Models\FundManagement;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FundmanagementImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $useroperation = new FundManagement([
            "id_fund" => $row['id_fund'],
            "source" => $row['source'],
            "value" => $row['value'],
            "currency" => $row['currency'],
            "value_eur" => $row['value_eur'],
        ]);

        return $useroperation;
    }
}
