<?php

namespace App\Http\Controllers;
use App\Traits\ResponseTrait;
abstract class Controller
{
    use ResponseTrait;

    public array $days_in = [
        "m" => 30,
        "q" => 120,
        "y" => 365,
    ];
    function __construct(){
        date_default_timezone_set("Asia/Kolkata");
    }
}
