<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTranscation extends Model
{
    protected $fillable = [
        'user_id',
        'payment_mode',
        'plan_id',
        'transaction_id',
        'order_id',
        'status',
        'timestamp',
        'response_received',
        'created_at',
        'updated_at',
    ];
}
