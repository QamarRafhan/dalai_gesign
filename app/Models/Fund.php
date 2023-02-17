<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function fundsManagement()
    {
         return $this->hasMany('App\Models\FundManagement','id_fund');
    }
}
