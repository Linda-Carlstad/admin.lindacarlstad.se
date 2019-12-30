<?php

namespace App\Http\Controllers;

use App\Initiation;
use App\InitiationKeyPerson;

use Illuminate\Http\Request;

class InitiationKeyPeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = InitiationKeyPerson::all();

        return view( 'person.index' )->with( 'people', $people );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $initiations = Initiation::all();
        return view( 'person.create' )->with( 'initiations', $initiations );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        InitiationKeyPerson::create( $request );

        return redirect( 'person' )->with( 'success', 'Ny nyckelperson skapad!' );
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
        $keyPerson = InitiationKeyPerson::findOrFail( $id );
        $initiations = Initiation::all();

        return view( 'person.edit' )
            ->with( 'keyPerson', $keyPerson  )->with( 'initiations', $initiations );
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
         $keyPerson = InitiationKeyPerson::findOrFail( $id );
         InitiationKeyPerson::updateInfo( $keyPerson, $request );

         return redirect( 'person' )->with( 'success', 'Nyckelperson uppdaterad.' );
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy( $id )
     {
         $keyPerson = InitiationKeyPerson::findOrFail( $id );
         $keyPerson->delete();

         return redirect( 'person' )->with( 'success', 'Nyckelperson borttagen.' );
     }
}
