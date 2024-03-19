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
        'table_id',
        'customer_id',
        'user_id',
        'discount_id'
    ];

    public $timestamps = true;

    public function tables(){
        return $this-> belongsTo(Table::class, 'table_id','id');
    }
    public function customers(){
        return $this-> belongsTo(Customer::class, 'customer_id','id');
    }
    public function users(){
        return $this-> belongsTo(User::class, 'user_id','id');
    }
    public function discounts(){
        return $this-> belongsTo(Discount::class, 'discount_id','id');
    }

    public function bill_details(){
        return $this-> hasMany(BillDetail::class,'bill_id','id');
    }
}
