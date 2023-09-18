<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'name'=> 'required',
            'email'=>'required',
            'password'=>'required'
        ]);

        return 'Hello This be the controller';
    }
}
