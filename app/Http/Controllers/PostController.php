<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
    	return view('posts.index');
    }    

    public function create()
    {
    	return view('posts.create');
    }

    public function store()
    {
		
    	// 1. example to store to db
		// $post = new Post;
		// $post->title = request('title');
		// $post->body = request('body');
		// $post->save();
		// return redirect('/');

		// 2. example to store to db
		// $post = new Post;
		// Post::create([
		// 	'title' => request('title'),
		// 	'body' => request('body'),
		// ]);
		
		// 3. example to store to db plus validation
		$this->validate(request(), [
			'title' => 'required',
			'body' => 'required'
		]);
		
    	Post::create(request(['title', 'body']));
		return redirect('/');

    }

    public function show()
    {
    	return view('posts.show');
    }
}
