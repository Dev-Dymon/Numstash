<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $fillable = [
        'user_id',
        'amount',
        'type',
        'reference',
        'status',
    ];


    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
