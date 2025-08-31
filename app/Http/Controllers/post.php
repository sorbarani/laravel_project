<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class post extends Controller
{
    public function index()
    {
        dd(request());
    }

    public function store(Request $request)
    {
        //store the user input
        // $value = request()->product;
        $array =  request()->all();
        var_dump($array);

    }
    
}
