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
    ];    
   
}
