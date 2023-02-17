<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOperation extends Model
{
    use HasFactory;
    protected $fillable = [
        'ID_user',
        'ID_fund',
        'amount',
        'currency',
        'amount_eur',
        'amount_tokens',
        'date_unblock',
        'status',
        'comments',
    ];
}
