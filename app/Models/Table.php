<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'capacity',
        'status',
        'floor_id'
    ];

    public $timestamps = true;

    public function floors(){
        return $this-> belongsTo(Floor::class, 'floor_id','id');
    }

    public function orders (){
        return $this->hasMany(Order::class, 'table_id','id');
    }
}
