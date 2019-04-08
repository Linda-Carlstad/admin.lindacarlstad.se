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
        $boardMembers = BoardMember::get()->all();
        return view( 'board.index' )->with( 'boardMembers', $boardMembers );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort( 404 );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort( 403 );
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
        $request->validate( [
            'position' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'description' => 'required|string',
        ] );

        $boardMember = BoardMember::findOrFail( $id );
        $boardMember->position = $request->position;
        $boardMember->name = $request->name;
        $boardMember->email = $request->email;
        $boardMember->description = $request->description;
        $boardMember->save();

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
        abort( 403 );
    }
}
