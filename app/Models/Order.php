<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
}
