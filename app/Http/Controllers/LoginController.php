<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Teacher;
use App\Student;


class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $admin = Admin::where('username', $request->username)
                        ->where('password', $request->password)
                        ->first();
        $teacher = Teacher::where('username', $request->username)
                        ->where('password', $request->password)
                        ->first();
        $student = Student::where('username', $request->username)
                        ->where('password', $request->password)
                        ->first();
        if ($admin){
            session()->put('role', 'admin');
            return redirect()->route('admin.index');
        }elseif ($teacher){
            session()->put('role', 'teacher');
            return redirect()->route('teachers-panel.index');
        }elseif ($student){
            session()->put('role', 'student');
            return redirect()->route('students-panel.index');
        }else{
            return redirect()->route('login')->with([
               'error' => 'Username/Password is Invalid'
            ]);
        }
    }


    public function logout()
    {
        session()->flush();
        return redirect()->route('login')->with([
            'success' => 'Successfully Logged Out!'
        ]);
    }
}
