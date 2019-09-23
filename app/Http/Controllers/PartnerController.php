<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $total = Partner::all()->count();

        if( isset( $request->search ) )
        {
            $search = $request->search;

            $partners = Partner::where( 'name', 'LIKE', '%' . $search . '%' )
                ->orWhere( 'type', 'LIKE', '%' . $search . '%' )
                ->orWhere( 'phone', 'LIKE', '%' . $search . '%' )
                ->orWhere( 'email', 'LIKE', '%' . $search . '%' )
                ->paginate( 20 );

            return view( 'partner.index' )->with( 'partners', $partners )->with( 'search', $search )->with( 'total', $total );
        }

        $partners = Partner::orderBy( 'id', 'desc' )->paginate( 20 );
        return view( 'partner.index' )->with( 'partners', $partners )->with( 'total', $total );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'partner.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Partner::create( $request );

        return redirect()->action( 'PartnerController@index' )->with( 'success', 'Ny partner skapad.' );
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
    public function edit( $id )
    {
        $partner = Partner::findOrFail( $id );

        return view( 'partner.edit' )->with( 'partner', $partner );
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
        $partner = Partner::findOrFail( $id );
        Partner::updateInfo( $partner, $request );

        return redirect()->action( 'PartnerController@index' )->with( 'success', 'Partner uppdaterad.' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $partner = Partner::findOrFail( $id );
        $partner->delete();

        return redirect()->action( 'PartnerController@index' )->with( 'success', 'Partner borttagen.' );
    }
}
