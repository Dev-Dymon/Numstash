<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'user_id',
        'service',
        'amount',
        'order_status',
    ];


    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
