<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    use HasFactory;
    protected $tabale = 'user_requests';

    public function fund()
    {
        return $this->belongsTo(Fund::class, 'id', 'ID_fund');
    }
}
