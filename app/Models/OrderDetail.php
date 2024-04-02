<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'order_id'
    ];

    public $timestamps = true;

    public function products(){
       return $this->belongsTo(Product::class, 'product_id','id');
    }


    public function orders(){
       return $this->belongsTo(Order::class, 'order_id','id');
    }
}
