<?php

namespace App\Http\Controllers;

use App\Jquerytodolist;
use Illuminate\Http\Request;

class JquerytodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.todolist.jquery');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jquerytodolist  $jquerytodolist
     * @return \Illuminate\Http\Response
     */
    public function show(Jquerytodolist $jquerytodolist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jquerytodolist  $jquerytodolist
     * @return \Illuminate\Http\Response
     */
    public function edit(Jquerytodolist $jquerytodolist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jquerytodolist  $jquerytodolist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jquerytodolist $jquerytodolist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jquerytodolist  $jquerytodolist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jquerytodolist $jquerytodolist)
    {
        //
    }
}
