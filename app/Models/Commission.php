<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commission extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'commissions';

    protected $guarded = [];

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function order()
    {
    	return $this->belongsTo(Order::class, 'order_id');
    }
}
