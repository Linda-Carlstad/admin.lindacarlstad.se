<?php

namespace App\Http\Controllers;

use App\BoardMember;

use Illuminate\Http\Request;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boardMembers = BoardMember::all();
        return view( 'board.index' )->with( 'boardMembers', $boardMembers );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'board.create' );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        BoardMember::create( $request );
        return redirect( 'board' )->with( 'success', 'Ny styrelseposition tillagd!' );
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
        $boardMember = BoardMember::findOrFail( $id );

        return view( 'board.edit' )
            ->with( 'boardMember', $boardMember  );
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
        $boardMember = BoardMember::findOrFail( $id );
        BoardMember::updateInfo( $boardMember, $request );
        return redirect( 'board' )->with( 'success', 'Styrelseposition uppdaterad.' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $boardMember = BoardMember::findOrFail( $id );
        $boardMember->delete();

        return redirect( 'board' )->with( 'success', 'Styrelseposition borttagen.' );
    }
}
