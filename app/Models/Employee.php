<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'phone',
        'salary',
        'timekeeping',
        'user_id'
    ];
    public $timestamps = true;

    protected $table = 'employees';

    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
