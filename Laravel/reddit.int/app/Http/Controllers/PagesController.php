<?php

namespace App\Http\Controllers;


class PagesController extends Controller
{
    public function index()
    {
    	return view('home');
    }


    public function home()
    {
    	return view('home');
    }


    public function instructies()
    {
    	return view('instructies');
    }


    public function login()
    {
    	return view('login');
    }


    public function register()
    {
    	return view('register');
    }
}
