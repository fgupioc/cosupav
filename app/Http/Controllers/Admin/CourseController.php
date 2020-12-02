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
        $courses = Course::with('sections.lessons')->where('condition', 'Publish')->get();
        return view('pages.courses.index', compact('courses'));
    }

    public function detail(Course $course)
    {
        $lessons = Course::listLessons($course->id)->where('lessons.condition', 'Publish');

        $allLessons = $lessons->get();
        $completed = $allLessons->where('completed', 1);
        $incomplete = $allLessons->where('completed', 0);

        $percentage = round(($completed->count() * 100) / $allLessons->count());

        return view('pages.courses.show', compact('course', 'allLessons', 'completed', 'incomplete', 'percentage'));
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
        $request->request->add(['title' => Str::title($request->title)]);
        $course = Course::create($request->all());
        return redirect()->route('courses.createClass', $course->slug);
    }

    public function createClass(Request $request, Course $course)
    {
        $sections = Section::with('lessons.section')->where('course_id', $course->id)->orderBy('id', 'desc')->get();
        $lessons = collect();
        $orders = [];
        foreach ($sections as $section) {
            $orders[$section->id] = $section->lessons->count();
            foreach ($section->lessons as $lesson) {
                $lessons->add($lesson);
            }
        }
        return view('pages.admin.course.create-class', compact('course', 'sections', 'lessons', 'orders'));
    }

    public function storeClass(Request $request, Course $course)
    {
        $order = Lesson::where('section_id', $request->section_id)->count();
        $request->request->add([
            'slug' => Str::slug($request->title, "-"),
            'order' => $order + 1
        ]);

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
        $request->request->add(['title' => Str::title($request->title)]);
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

    public function updateCondition(Request $request, Course $course)
    {
        return response()->json(["status" => $course->update(['condition' => $request->condition])]);
    }

    public function changeOrderLesson(Request $request)
    {
        $lesson = Lesson::findOrFail($request->lesson);
        return response()->json(["status" => $lesson->update(['order' => $request->order])]);
    }

    public function lessonUpdateCondition(Request $request, Lesson $lesson)
    {
        return response()->json(["status" => $lesson->update(['condition' => $request->condition])]);
    }
}
