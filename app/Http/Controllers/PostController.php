<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(Request $request) {
        $postFields = $request->validate([
            'title'=>'required',
            'body'=> 'required'
        ]);
        $postFields['title'] = strip_tags($postFields['title']);
        $postFields['title'] = strip_tags($postFields['body']);
        $postFields['user_id'] = auth()->id();
;    }
}
