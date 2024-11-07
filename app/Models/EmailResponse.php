<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailResponse extends Model
{
    protected $fillable = [
        'user_id',
        'batch_id',
        'email',
        'status',
        'user',
        'time',
        'domain',
        'disposable',
        'role',
        'free_email',
        'valid_format',
        'reason',
        'mx_domain',
        'mx_record',
        'retry',
        'created_at',
        'updated_at',
        'email_check_date',
    ];
}
