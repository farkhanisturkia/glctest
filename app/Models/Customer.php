<?php

namespace App\Models;

use App\Models\User;
use App\Models\Paket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'telephone',
        'address',
        'paket_id',
        'ktp',
        'home'
    ];

    public function paket(){
        return $this->belongsTo(Paket::class, 'paket_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
