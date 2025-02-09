<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        return view('admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => Admin::get_password_validation(),
        ]);

        $admin = new Admin();
        $admin->email = $validated['email'];
        $admin->password = Hash::make($validated['password']);
        $admin->save();

        return redirect('admins')->with('success', 'Ny Admin skapat!');
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
    public function update(Request $request, Admin $admin)
    {
        Admin::updateInfo($admin, $request);
        return redirect('admins')->with('success', 'Admin uppdaterad.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        if (Admin::count() <= 1) {
            return redirect('admins')->with("error", "Can't delete the last admin!");
        }

        $user = Auth::user();
        $delete_self = $user && $user->id == $admin->id;

        // Make the variable mutable, otherwise errors out
        $admin = Admin::findOrFail($admin->id);
        $admin->delete();

        if ($delete_self) {
            Auth::logout();
            return redirect('/login');
        }
        return redirect('admins')->with('success', 'Admin borttaget.');
    }
}
