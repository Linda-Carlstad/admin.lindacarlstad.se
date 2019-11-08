<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $total = Member::all()->count();

        if( isset( $request->search ) )
        {
            $search = $request->search;

            $members = Member::where( 'firstName', 'LIKE', '%' . $search . '%' )
                ->orWhere( 'lastName', 'LIKE', '%' . $search . '%' )
                ->orWhere( 'id_number', 'LIKE', '%' . $search . '%' )
                ->orWhere( 'email', 'LIKE', '%' . $search . '%' );

            $totalSearch = $members->count();
            $members = $members->paginate( 20 );

            return view( 'member.index' )
                ->with( 'members', $members->appends( Input::except( 'page' ) ) )
                ->with( 'search', $search )
                ->with( 'total', $total )
                ->with( 'totalSearch', $totalSearch );
        }

        $members = Member::orderBy('id', 'desc')->paginate( 20 );
        return view( 'member.index' )->with( 'members', $members )->with( 'total', $total );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'member.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        switch( $request->type )
        {
            case 'file':
                return back()->with( 'error', 'Function not yet implemented!' );
                break;

            case 'manual':
                $result = Member::create( $request );
                break;
            default:
                abort(403);
                break;
        }

        return redirect( 'member' )->with( 'success', $result[ 'success' ] );
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
        $member = Member::findOrFail( $id );

        return view( 'member.edit' )
            ->with( 'member', $member  );
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
        $member = Member::findOrFail( $id );
        Member::updateInfo( $member, $request );

        return redirect( 'member' )->with( 'success', 'Medlem har uppdaterats!' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::findOrFail( $id );
        $member->delete();

        return redirect( 'member' )->with( 'success', 'Medlem borttagen.' );
    }
}
