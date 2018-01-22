<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
    	$posts = Post::latest()->get();
    	return view('posts.index', compact('posts'));
    }    

    public function create()
    {
    	return view('posts.create');
    }

    public function store()
    {
		$this->validate(request(), [
			'title' => 'required',
			'body' => 'required'
		]);
		
    	Post::create(request(['title', 'body']));
		return redirect('/');

    }

    public function show(Post $post)
    {
    	return view('posts.show', compact('post'));
    }
}
