<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\Teacher;


class AdminController extends Controller
{
    public function index()
    {
        return view('pages.admin.index');
    }

    public function blank()
    {
        return view('pages.blank');
    }

    public function login()
    {
        return view('login');
    }

    public function allTeachers()
    {
        $teachers = Teacher::all();

        return view('pages.teacher.teachers', [
            'teachers' => $teachers
        ]);
    }

    public function TeacherCreateForm()
    {
        return view('pages.teacher.create');
    }

    public function storeTeacher(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'regex:/^[a-z ,.\'-]+$/i', 'max:255'],
            'email' => ['required', 'email'],
            'username' => ['required'],
            'password' => ['required'],
            'repass' => ['required', 'same:password']
        ]);

        $obj = new Teacher();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->username = $request->username;
        $obj->password = $request->password;
        if ($obj->save())
            return redirect()->route('teachers.all')->with([
                'new' => $obj->id,
                'success' => 'Teacher Added!'
            ]);
        else
            return redirect()->route('teachers.create')->with('error', 'Teacher Cannot be Added!');
    }

    public function teacherEditForm($id)
    {
        $obj = new Teacher();
        $obj = $obj->find($id);
        if ($obj)
            return view('pages.teacher.edit',[
                'teacher' => $obj
            ]);
        else
            return redirect()->route('teachers.all')->with('error', 'Something went wrong in retrieving Teacher data to edit!');

    }


    public function teacherUpdate($id, Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'regex:/^[a-z ,.\'-]+$/i', 'max:255'],
            'email' => ['required', 'email'],
            'username' => ['required'],
            'repass' => ['same:password']
        ]);

        $obj = new Teacher();
        $obj = $obj->find($id);
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->username = $request->username;
        if (isset($request->password) && $request->password == $request->repass)
            $obj->password = $request->password;
        if ($obj->save())
            return redirect()->route('teachers.all')->with([
                'update' => $obj->id,
                'success' => 'Teacher Updated!'
            ]);
        else
            return redirect()->route('teachers.all')->with('error', 'Teacher Cannot be Updated!');
    }

    public function teacherDelete($id)
    {
        $obj = new Teacher();
        $obj = $obj->find($id);
        if ($obj->delete())
            return redirect()->route('teachers.all')->with('success', 'Teacher Deleted!');
        else
            return redirect()->route('teachers.all')->with('error', 'Something went wrong in retrieving Teacher data to edit!');
    }

    public function settingsIndex()
    {
        return view('pages.admin.settings');
    }

    public function changePassword(Request $request)
    {
        $validatedData = $request->validate([
            'password' => ['required'],
            'repass' => ['required', 'same:password']
        ]);
        $obj = new Admin();
        $obj = $obj->find(1);
        $obj->password = $request->password;
        if ($obj->save())
            return redirect()->route('settings.index')->with([
                'success' => 'Password Changed!'
            ]);
        else
            return redirect()->route('settings.index')->with([
                'error' => 'Password Change Error!'
            ]);;
    }

    public function changeEmail(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'email'],
        ]);
        $obj = new Admin();
        $obj = $obj->find(1);
        $obj->email = $request->email;
        if ($obj->save())
            return redirect()->route('settings.index')->with([
                'success' => 'Email Changed!'
            ]);
        else
            return redirect()->route('settings.index')->with([
                'error' => 'Email Change Error!'
            ]);;
    }

    public function changeUsername(Request $request)
    {
        $validatedData = $request->validate([
            'username' => ['required'],
        ]);
        $obj = new Admin();
        $obj = $obj->find(1);
        $obj->username = $request->username;
        if ($obj->save())
            return redirect()->route('settings.index')->with([
                'success' => 'Username Changed!'
            ]);
        else
            return redirect()->route('settings.index')->with([
                'error' => 'Username Change Error!'
            ]);;
    }
}
