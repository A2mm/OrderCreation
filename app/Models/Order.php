<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'orders';

    protected $guarded = [];

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function commissions()
    {
    	return $this->hasMany(Commission::class, 'order_id', 'id');
    }

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d H:i:s');
       // return Carbon::createFromFormat('Y-m-d H:i:s', $value->format('Y-m-d H:i:s');
    }

    public function currency()
    {
        return 'EGP';
    }
}
