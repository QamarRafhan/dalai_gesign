<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundManagement extends Model
{
    use HasFactory;
    protected $fillable = [
           "id_fund",
            "source",
            "value",
            "currency", 
            "value_eur", 
            'ID_fund'
    ];    
    public function alloperations()
    {
         return $this->hasMany('App\Models\useroperation','id_fund');
    }
    public function user()
    {
         return $this->belongsTo('App\Models\User','id');
    }
}
