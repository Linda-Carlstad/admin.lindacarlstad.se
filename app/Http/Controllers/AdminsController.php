<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function index()
    {
        $admins = Admin::orderBy('email')->get();

        return view( 'admins.index' )->with( 'admins', $admins );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        Admin::create( $request );
        return redirect( 'admins' )->with( 'success', 'Ny Admin skapat!' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail( $id );

        return view( 'admins.edit' )
            ->with( 'admin', $admin  );
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
        $admin = Admin::findOrFail( $id );
        Admin::updateInfo( $admin, $request );

        return redirect('admins')->with('success', 'Admin uppdaterad.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        if (Admin::count() <= 1) {
            return redirect('admins')->with("error", "Can't delete the last admin!");
        }
        $admin = Admin::findOrFail( $id );
        $admin->delete();

        return redirect('admins')->with('success', 'Admin borttaget.');
    }
}
