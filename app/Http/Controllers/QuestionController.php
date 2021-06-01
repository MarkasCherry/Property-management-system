<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::active()->latest()->paginate(10);

        return view('questions/index', compact('questions'));
    }
}
