<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    use HasFactory;
    protected $tabale = 'user_requests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ID_user',
        'ID_fund',
        'date',
        'amount',
        'amount_eur',
        'operation_type',
        'status',
    ];


    public $allStatus = [
        'Requested',
        'Accepted',
        'Completed',

    ];

    protected $casts = [
        'date' => 'datetime',
    ];
    public function fund()
    {
        return $this->belongsTo(Fund::class, 'ID_fund', 'id');
    }
}
