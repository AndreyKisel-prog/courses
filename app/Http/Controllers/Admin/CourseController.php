<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('created_at', 'DESC')->get();
        return view('admin.courses.index', [
            'courses'=> $courses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'level' => 'required|max:50',
            'price' => 'required|max:10',
            'description' => 'required|max:1000',
            'category' => 'required|max:20',
            'day_duration' => 'required|max:4',
        ]);

        $course = new Course;
        $course->name = $request->name;
        $course->level = $request->level;
        $course->price = $request->price;
        $course->description = $request->description;
        $course->category = $request->category;
        $course->day_duration = $request->day_duration;
        $course->save();
        return redirect()->back()->withSuccess('New course has been added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $course = Course::findOrFail($id);
            return view('admin.courses.edit', compact('course'));
        }catch (ModelNotFoundException $exception) {
            return redirect(route('admin.courses.index'))->withError('Course with id:  '. $id .' not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|max:50',
            'level' => 'required|max:50',
            'price' => 'required|max:10',
            'description' => 'required|max:1000',
            'category' => 'required|max:20',
            'day_duration' => 'required|max:4',
        ]);

        $course = Course::find($id);
        $course->name = $request->name;
        $course->level = $request->level;
        $course->price = $request->price;
        $course->description = $request->description;
        $course->category = $request->category;
        $course->day_duration = $request->day_duration;
        $course->save();
        return redirect()->back()->withSuccess('The course has been edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::destroy($id);
        return redirect()->back()->withSuccess('The course has been deleted successfully');

    }
}
