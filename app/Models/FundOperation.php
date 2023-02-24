<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundOperation extends Model
{
    use HasFactory;
    protected $fillable = [
        "ID_fund",
         "date",
         "month",
         "year", 
         "token_investment",
         "eur_investment",
         "num_tokens", 
         "value_beginning", 
         "value_imported", 
         "value_end", 
         "token_value", 
         "profit", 
         "increase", 
         "commissions", 
 ];  
 
}
