<?php

namespace App\Http\Controllers;

use App\Initiation;
use App\InitiationDay;

use Illuminate\Http\Request;

class InitiationDaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $days = InitiationDay::orderBy('order', 'desc')->get();

        return view( 'day.index' )->with( 'days', $days );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $initiations = Initiation::all();
       return view( 'day.create' )->with( 'initiations', $initiations );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        InitiationDay::create( $request );
        return redirect( 'day' )->with( 'success', 'Ny dag skapad!' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort( 404 );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $initiationDay = InitiationDay::findOrFail( $id );
        $initiations = Initiation::all();

        return view( 'day.edit' )
            ->with( 'initiationDay', $initiationDay )->with( 'initiations', $initiations );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id )
    {
        $day = InitiationDay::findOrFail( $id );
        InitiationDay::updateInfo( $day, $request );

        return redirect( 'day' )->with( 'success', 'Nollningsdag uppdaterad.' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $day = InitiationDay::findOrFail( $id );
        $day->delete();

        return redirect( 'day' )->with( 'success', 'Dag borttagen.' );
    }
}
