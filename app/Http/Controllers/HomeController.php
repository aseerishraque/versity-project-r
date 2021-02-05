<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function teachersPanel()
    {
        return view('pages.teachers-panel.index');
    }

    public function studentsPanel()
    {
        return view('pages.students-panel.index');
    }
}
