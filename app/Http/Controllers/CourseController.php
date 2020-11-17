<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('pages.courses.index');
    }

    public function show() {
        return view('pages.courses.show');
    }
}
