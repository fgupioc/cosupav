<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class CourseController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $courses = Course::orderBy('created_at', 'desc')->get();
        return view('pages.admin.course.index', compact('courses'));
    }


    public function list()
    {
        return view('pages.courses.index');
    }

    public function detail()
    {
        return view('pages.courses.show');
    }

    public function create()
    {
        return view('pages.admin.course.create');
    }


    public function store(Request $request)
    {
        $uuid = Str::uuid()->toString();
        if ($request->file()) {
             $file = $request->file('file');
             $path = str_replace(" ", "_", time() . "_" . $file->getClientOriginalName());
             storageFile("{$uuid}/" . $path, file_get_contents($file->getRealPath()));
             $request->request->add(['logo' => $path]);
         }
        $request->request->add(['slug' => Str::slug($request->title, "-")]);
        $request->request->add(['uuid' => $uuid]);
        $course = Course::create($request->all());
        return redirect()->route('courses.createClass', $course->slug);
    }

    public function createClass(Request $request, Course $course)
    {
        $sections = Section::where('course_id', $course->id)->orderBy('id', 'desc')->get();
        $lessons = Lesson::with('section')->get();
        return view('pages.admin.course.create-class', compact('course', 'sections', 'lessons'));
    }

    public function storeClass(Request $request, Course $course)
    {
        $request->request->add(['slug' => Str::slug($request->title, "-")]);
        Lesson::create($request->all());
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Course $course
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Course $course)
    {
        return view('pages.admin.course.show', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function update(Request $request, Course $course)
    {
        if ($request->file()) {
           storageDeleteFile($course->pathLogo);
            $file = $request->file('file');
            $path = str_replace(" ", "_", time() . "_" . $file->getClientOriginalName());
            storageFile("{$course->uuid}/" . $path, file_get_contents($file->getRealPath()));
            $request->request->add(['logo' => $path]);
        }
        $request->request->add(['slug' => Str::slug($request->title, "-")]);
        $course->update($request->all());
        return redirect()->route('courses.edit', $course->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateCondition(Request $request, Course $course) {
        return response()->json(["status" => $course->update(['condition'=> $request->condition])]);
    }

}
