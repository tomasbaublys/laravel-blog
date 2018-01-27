<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
    	$posts = Post::latest();

        if ($month = request('month')) {
            $posts->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = request('year')) {
            $posts->whereYear('created_at', $year);
        }

        $posts = $posts->get();

        $archives = Post::selectRaw('year(`created_at`) year, monthname(`created_at`) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at)')
            ->get()
            ->toArray();

    	return view('posts.index', compact('posts', 'archives'));
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

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );
		
		return redirect('/');

    }

    public function show(Post $post)
    {
    	return view('posts.show', compact('post'));
    }
}
