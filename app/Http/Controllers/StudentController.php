<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('pages.admin.students', [
            'students' => $students
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
        $validatedData = $request->validate([
            'name' => ['required', 'regex:/^[a-z ,.\'-]+$/i', 'max:255'],
            'email' => ['required', 'email'],
            'username' => ['required'],
            'password' => ['required'],
            'repass' => ['required', 'same:password']
        ]);

        $obj = new Student();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->username = $request->username;
        $obj->password = $request->password;
        if ($obj->save())
            return redirect()->route('students.index')->with([
                'new' => $obj->id,
                'success' => 'Student Added!'
            ]);
        else
            return redirect()->route('students.index')->with('error', 'Student Cannot be Added!');
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
        $validatedData = $request->validate([
            'name' => ['required', 'regex:/^[a-z ,.\'-]+$/i', 'max:255'],
            'email' => ['required', 'email'],
            'username' => ['required'],
            'repass' => ['same:password']
        ]);

        $obj = new Student();
        $obj = $obj->find($id);
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->username = $request->username;
        if (isset($request->password) && $request->password == $request->repass)
            $obj->password = $request->password;
        if ($obj->save())
            return redirect()->route('students.index')->with([
                'update' => $obj->id,
                'success' => 'Student Updated!'
            ]);
        else
            return redirect()->route('students.index')->with('error', 'Student Cannot be Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = new Student();
        $obj = $obj->find($id);
        if ($obj->delete())
            return redirect()->route('students.index')->with([
                'success' => 'Student Deleted!'
            ]);
        else
            return redirect()->route('students.index')->with('error', 'Student Cannot be Deleted!');
    }
}
