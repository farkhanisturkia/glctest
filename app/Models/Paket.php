<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paket extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price'
    ];

    public function customer(){
        return $this->hasMany(Customer::class);
    }
}
