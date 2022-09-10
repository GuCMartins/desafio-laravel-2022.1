<?php

namespace App\Http\Controllers;

use App\Models\Championships;
use App\Models\Teams;
use Illuminate\Http\Request;

class ChampioshipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $championships = Championships::all();
        return view('admin.championships.index', compact('championships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $championship = new Championship();
        return view('admin.championships.create',compact('championship'));
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
     * @param  \App\Models\Championships  $championships
     * @return \Illuminate\Http\Response
     */
    public function show(Championships $championships)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Championships  $championships
     * @return \Illuminate\Http\Response
     */
    public function edit(Championships $championships)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Championships  $championships
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Championships $championships)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Championships  $championships
     * @return \Illuminate\Http\Response
     */
    public function destroy(Championships $championships)
    {
        //
    }
}
