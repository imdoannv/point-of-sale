<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'image',
        'description',
        'category_id',
        'product_unit_id',
        'warehouse_id'
    ];

    public $timestamps = true;

    public function categories(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function product_units(){
        return $this->belongsTo(ProductUnit::class,'product_unit_id','id');
    }

    public function warehouses(){
        return $this->belongsTo(WareHouse::class,'warehouse_id','id');
    }


}
