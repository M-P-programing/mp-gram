<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserController extends Controller
{
    public function config(){
        return view('user.config');
    }

    public function update(Request $request){
        $id = \Auth::user()->id;
        $name = $request->input('name');
        $name = $request->input('surname');
        $name = $request->input('nick');
        $name = $request->input('email');
        
        
    }
}
