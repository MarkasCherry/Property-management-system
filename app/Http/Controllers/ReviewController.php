<?php

namespace App\Http\Controllers;

class ReviewController extends Controller
{
    public function index()
    {
        return view('reviews.index');
    }
}
