<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class FuntionController extends Controller
{
    public static function  UniqueCode()
    {
        $rand = rand(1111111,999999);
        return $rand;
    }
    
}
