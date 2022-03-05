<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class PresentationController extends Controller
{

    public function index()
    {
        $courses = Course::orderBy('created_at', 'desc')->get();
        return view('presentation', compact('courses'));
    }
}
