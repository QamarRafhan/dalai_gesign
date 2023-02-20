<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOperation extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_fund',
        'amount',
        'currency',
        'amount_eur',
        'amount_tokens',
        'date_unblock',
        'status',
        'comments',
    ];
    public function user()
    {
         return $this->belongsTo('App\Models\User','id');
    }
}
