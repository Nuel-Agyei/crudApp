<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'name'=> ['required', 'min:3', Rule::unique('users', 'name')],
            'email'=>['required', 'email'],
            'password'=>['required', 'min:6']
        ]);
        $fields['password'] = bcrypt($fields['password']);
       $user = User::create($fields);
        auth()->login($user);
        return redirect('/');
    }
}
