<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function pp(): string
    {
        return view('privacy-policy');
    }
    public function indexing(): string
    {
        return view('term-of-use');
    }
    public function about(): string
    {
        return view('about');
    }
    public function services(): string
    {
        return view('services');
    }
    public function home(): string
    {
        return view('home');
    }
     public function index(): string
    {
        return view('rbac');
    }
}
