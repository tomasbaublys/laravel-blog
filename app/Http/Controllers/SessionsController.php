<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SessionsController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'destroy']);
	}

    public function create()
    {
    	return view('sessions.create');
    }
    public function store()
    {
    	if (! auth()->attempt(request(['email', 'password']))) 
    	{
    		return back()->withErrors([
    			'message' => 'Please check your credentials'
    		]);
    	}

    	return redirect()->home();
    }

    public function destroy()
    {
    	auth()->logout();

    	return redirect()->home();
    }
}
