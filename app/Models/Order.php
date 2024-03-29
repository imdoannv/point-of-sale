<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'table_id',
        'price',
        'status'
    ];

    public $timestamps = true;

    public function table(){
        return $this->belongsTo(Table::class, 'table_id','id');
    }

    public function order_details(){
        $this->hasMany(OrderDetail::class,'order_id','id');
    }
}
