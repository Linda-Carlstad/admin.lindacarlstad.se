<?php

namespace App\Http\Controllers;

use App\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $total = Song::all()->count();
        if( isset( $request->search ) )
        {
            $search = $request->search;

            $songs = Song::where( 'title', 'LIKE', '%' . $search . '%' )
                ->orWhere( 'melody', 'LIKE', '%' . $search . '%' )
                ->orWhere( 'text', 'LIKE', '%' . $search . '%' )
                ->paginate( 20 );

            return view( 'song.index' )->with( 'songs', $songs )->with( 'search', $search )->with( 'total', $total );
        }

        $songs = Song::orderBy('title', 'desc')->paginate( 20 );

        return view( 'song.index' )->with( 'songs', $songs )->with( 'total', $total );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'song.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Song::create( $request );

        return redirect()->action( 'SongController@index' )->with( 'success', 'Ny sång skapad.' );
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
        $song = Song::findOrFail( $id );

        return view( 'song.edit' )->with( 'song', $song );
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
        $song = Song::findOrFail( $id );
        Song::updateInfo( $song, $request );

        return redirect()->action('SongController@index')->with( 'success', 'Sång uppdaterad.' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $song = Song::findOrFail( $id );
        $song->delete();

        return redirect()->action( 'SongController@index' )->with( 'success', 'Sång borttagen.' );
    }
}
