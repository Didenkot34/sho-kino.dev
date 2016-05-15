<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MyController extends Controller
{
    public function myExeption($check, $code = 404, $errorMessage = '404 Page Not Found')
    {
        if ($check === null) {
            abort($code, $errorMessage);
        }
        return $check;
    }
}