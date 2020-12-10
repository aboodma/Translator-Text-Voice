<?php

namespace App\Http\Controllers;

use App\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function current()
    {
        return view('admin.visitors.current');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function all_count()
    {
        return \Shetabit\Visitor\Models\Visit::where("created_at",">",\Illuminate\Support\Carbon::now()->subDay())->where("created_at","<",\Illuminate\Support\Carbon::now())->count();
    }
    public function day_count()
    {
        return  \Shetabit\Visitor\Models\Visit::where("created_at",">",\Illuminate\Support\Carbon::now()->subMonth())->where("created_at","<",\Illuminate\Support\Carbon::now())->count();
        //
    }
    public function month_count()
    {
        return  \Shetabit\Visitor\Models\Visit::all()->count();
        //
    }
    public function all()
    {
        return view('admin.visitors.all');
    }
    public function day()
    {
        return view('admin.visitors.day');
        //
    }
    public function month()
    {
        return view('admin.visitors.month');
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
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function show(Visitor $visitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitor $visitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitor $visitor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        //
    }
}
