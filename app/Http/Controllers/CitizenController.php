<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitizenController extends Controller
{
    //
    public function create_rti(){
        return inertia("Citizen/Create");
    }

    public function store_rti(Request $request){

        dd($request);
    }
}
