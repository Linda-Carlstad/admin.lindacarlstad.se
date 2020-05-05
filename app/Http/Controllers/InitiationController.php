<?php

namespace App\Http\Controllers;

use App\Initiation;
use Illuminate\Http\Request;

class InitiationController extends Controller
{
    public function index()
    {
        $initiations = Initiation::orderBy('year', 'desc')->get();

        return view( 'initiation.index' )->with( 'initiations', $initiations );
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
        Initiation::create( $request );
        return redirect( 'initiation' )->with( 'success', 'Nytt nollningsår skapat!' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $initiation = Initiation::findOrFail( $id );
        $persons = $initiation->persons;
        $days = $initiation->days;


        return view( 'initiation.show' )
            ->with( 'initiation', $initiation  )->with( 'persons', $persons )->with( 'days', $days );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $initiation = Initiation::findOrFail( $id );

        return view( 'initiation.edit' )
            ->with( 'initiation', $initiation  );
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
        $initiation = Initiation::findOrFail( $id );
        Initiation::updateInfo( $initiation, $request );

        return redirect( 'initiation' )->with( 'success', 'Nollningsår uppdaterad.' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $initiation = Initiation::findOrFail( $id );
        $initiation->delete();

        return redirect( 'initiation' )->with( 'success', 'Nollningsår borttaget.' );
    }
}
