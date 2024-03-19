<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'bill_id',
        'product_id',
        'quantity',
        'price'
    ];

    public $timestamps = true;

    public function products(){
        return $this->belongsTo(Product::class, 'product_id','id');
    }

    public function bills(){
        return $this->belongsTo(Bill::class, 'bill_id','id');
    }

}
