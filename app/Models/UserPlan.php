<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPlan extends Model
{
    protected $fillable = [
        "user_id","plan_id","valid_form","valid_to"
    ];

    /**
     * @trait Illuminate\Database\Eloquent\Concerns\Hasone user_id
     */
    public function user(){
        return $this->hasOne(User::class,"id","user_id");
    }

    /**
     * @trait Illuminate\Database\Eloquent\Concerns\Hasone plan_id
     */
    public function plan(){
        return $this->hasOne(Plan::class,"id","plan_id");
    }
}
