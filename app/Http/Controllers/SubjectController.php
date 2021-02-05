<?php

namespace App\Http\Controllers;

use App\Course;
use App\Session_list;
use App\Subject;
use App\Teacher;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = Subject::all();
        return view('pages.admin.subjects', [
            'subjects' => $sessions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $validatedData = $request->validate([
//            'name' => ['required', 'regex:/^[a-z ,.\'-]+$/i', 'max:255'],
//        ]);

        $obj = new Subject();
        $obj->name = $request->name;
        if ($obj->save())
            return redirect()->route('subjects.index')->with([
                'new' => $obj->id,
                'success' => 'Subject Added!'
            ]);
        else
            return redirect()->route('subjects.index')->with('error', 'Subject Cannot be Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
//        $validatedData = $request->validate([
//            'name' => ['required', 'regex:/^[a-z ,.\'-]+$/i', 'max:255'],
//        ]);

        $obj = new Subject();
        $obj = $obj->find($id);
        $obj->name = $request->name;
        if ($obj->save())
            return redirect()->route('subjects.index')->with([
                'update' => $obj->id,
                'success' => 'Subject Updated!'
            ]);
        else
            return redirect()->route('subjects.index')->with('error', 'Subject Cannot be Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = new Subject();
        $obj = $obj->find($id);
        if ($obj->delete())
            return redirect()->route('subjects.index')->with([
                'success' => 'Subject Deleted!'
            ]);
        else
            return redirect()->route('subjects.index')->with('error', 'Subject Cannot be Deleted!');
    }

    public function coursesOffered()
    {
        $sessions = Session_list::all();
        $teachers = Teacher::all();
        $subjects = Subject::all();
        $courses = Course::join('subjects', 'courses.subject_id', 'subjects.id')
                            ->join('teachers', 'teachers.id', 'courses.teacher_id')
                            ->join('session_lists', 'session_lists.id', 'courses.session_id')
                            ->select('courses.*', 'teachers.name as teacher', 'session_lists.name as session', 'subjects.name as subject')
                            ->get();
        return view('pages.admin.courses', [
           'courses' => $courses,
            'subjects' => $subjects,
            'sessions' => $sessions,
            'teachers' => $teachers
        ]);
    }

    public function offerCourse(Request $request)
    {
        $obj = new Course();
        $obj->subject_id = $request->subject_id;
        $obj->teacher_id = $request->teacher_id;
        $obj->session_id = $request->session_id;
        if ($obj->save()){
            return redirect()->route('courses.offered')->with([
               'new' => $obj->id,
               'success' => 'Course Offering Added!'
            ]);
        }
    }

    public function updateOffer(Request $request, $id)
    {
        $obj = new Course();
        $obj = $obj->find($id);
        $obj->subject_id = $request->subject_id;
        $obj->teacher_id = $request->teacher_id;
        $obj->session_id = $request->session_id;
        if ($obj->save()){
            return redirect()->route('courses.offered')->with([
                'update' => $obj->id,
                'success' => 'Course Offering Updated!'
            ]);
        }
    }

    public function destroyOffer($id)
    {
        $obj = new Course();
        $obj = $obj->find($id);
        if ($obj->delete()){
            return redirect()->route('courses.offered')->with([
                'success' => 'Course Offering Deleted!'
            ]);
        }
    }
}
