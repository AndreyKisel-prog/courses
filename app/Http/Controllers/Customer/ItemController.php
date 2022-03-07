<?php

namespace App\Http\Controllers\Customer;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($course_id)
    {
        $course = Course::find($course_id);

        return view('customer.item', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $courses = $user->courses;

        if ($courses->pluck('id')->contains($request->course_id)) {
            return redirect()->back()->withError('Error: The course had been saved early');
        } else {
            $user->courses()->attach(
                $request->course_id
            );
            return redirect()->back()->withSuccess('The course saved');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($course_id)
    {
        Auth::user()->courses()->detach($course_id);
        return redirect()->back()->withSuccess('The course has been deleted form your favorites successfully');
    }
}
