<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'company';

    public $fillable = [
        'first_name',
        'last_name',
        'mobile_number',
        'address',
        'city',
        'cp',
        'country',
        'dni',
    ];
    public function getUserCompnay(){
        return $this->belongsTo(User::class,'id','id_user');
    }
}
