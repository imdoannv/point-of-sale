<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_price',
        'status',
        'customer_id',
        'order_id',
        'user_id',
        'discount_id'
    ];

    public $timestamps = true;

    public function customers(){
        return $this-> belongsTo(Customer::class, 'customer_id','id');
    }
    public function users(){
        return $this-> belongsTo(User::class, 'user_id','id');
    }
    public function discounts(){
        return $this-> belongsTo(Discount::class, 'discount_id','id');
    }
    public function order(){
        return $this-> belongsTo(Order::class,'order_id','id');
    }
}
