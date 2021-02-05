<?php

namespace App\Http\Controllers;

use App\Session_list;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = Session_list::all();
        return view('pages.admin.sessions', [
           'sessions' => $sessions
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
        ]);

        $obj = new Session_list();
        $obj->name = $request->name;
        if ($obj->save())
            return redirect()->route('sessions.index')->with([
                'new' => $obj->id,
                'success' => 'Session Added!'
            ]);
        else
            return redirect()->route('sessions.index')->with('error', 'Session Cannot be Added!');
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

        $obj = new Session_list();
        $obj = $obj->find($id);
        $obj->name = $request->name;
        if ($obj->save())
            return redirect()->route('sessions.index')->with([
                'update' => $obj->id,
                'success' => 'Session Updated!'
            ]);
        else
            return redirect()->route('sessions.index')->with('error', 'Session Cannot be Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = new Session_list();
        $obj = $obj->find($id);
        if ($obj->delete())
            return redirect()->route('sessions.index')->with([
                'success' => 'Session Deleted!'
            ]);
        else
            return redirect()->route('sessions.index')->with('error', 'Session Cannot be Deleted!');
    }
}
