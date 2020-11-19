<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index() {
        return view('pages.admin.course.index');
    }


    public function list() {
        return view('pages.courses.index');
    }

    public function detail() {
        return view('pages.courses.show');
    }
}
