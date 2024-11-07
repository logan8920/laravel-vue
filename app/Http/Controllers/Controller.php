<?php

namespace App\Http\Controllers;
use App\Traits\ResponseTrait;
abstract class Controller
{
    use ResponseTrait;

    function __construct(){
        date_default_timezone_set("Asia/Kolkata");
    }
}
