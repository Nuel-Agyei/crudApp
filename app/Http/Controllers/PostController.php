<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function deletePost(Post $post){
        if (auth()->user()->id !==$post['user_id']){
            return redirect('/');
        }
    }
    public function postUpdate(Post $post, Request $request){
        if (auth()->user()->id !==$post['user_id']){
            return redirect('/');
        }
        $postFields = $request->validate([
            'title'=>'required',
            'body'=>'required'
        ]);
        $postFields['title'] = strip_tags($postFields['title']);
        $postFields['body'] = strip_tags($postFields['body']);

        $post->update($postFields);
        return redirect('/');
    }
    public function showEditScreen(Post $post){
        if (auth()->user()->id !==$post['user_id']){
            return redirect('/');
        }

        return view('/edit', ['post'=> $post]);
    }
    public function create(Request $request) {
        $postFields = $request->validate([
            'title'=>'required',
            'body'=> 'required'
        ]);
        $postFields['title'] = strip_tags($postFields['title']);
        $postFields['body'] = strip_tags($postFields['body']);
        $postFields['user_id'] = auth()->id();
        Post::create($postFields);
        return redirect('/');
    }
}
