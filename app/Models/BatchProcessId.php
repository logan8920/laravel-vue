<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BatchProcessId extends Model
{
    protected $fillable = [

    	'file_name',
		'total_jobs',
		'job_completed',
		'status',
		'created_at',
		'updated_at',
    ];

    public function email_response()
    {
    	return $this->hasMany(EmailResponse::class,"batch_id",'id');
    }
}
