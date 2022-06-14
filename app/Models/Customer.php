<?php

namespace App\Models;


use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function order()
    {
    	return $this->belongsToMany(Order::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
