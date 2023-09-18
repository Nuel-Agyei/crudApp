<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'name'=> ['required', 'min:3'],
            'email'=>['required', 'email'],
            'password'=>['required', 'min:6']
        ]);

        return 'Hello This be the controller';
    }
}
