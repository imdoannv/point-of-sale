<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'address'
    ];

    protected  $table = 'warehouses';

    public function products(){
        return $this->hasMany(Product::class, 'warehouse_id', 'id');
    }
}
