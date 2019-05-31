<?php

namespace App\Http\Controllers;

use App\InitiationDay;
use App\InitiationKeyPerson;

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
        $keyPeople = InitiationKeyPerson::all();

        return view( 'initiation.index' )->with( 'days', $days )->with( 'keyPeople', $keyPeople );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'initiation.create' );
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
        return redirect( 'initiation' )->with( 'success', 'Ny dag skapad!' );
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

        return view( 'initiation.edit' )
            ->with( 'initiationDay', $initiationDay  );
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

        return redirect( 'initiation' )->with( 'success', 'Nollningsdag uppdaterad.' );
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

        return redirect( 'initiation' )->with( 'success', 'Dag borttagen.' );
    }
}
