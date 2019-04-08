<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    public static function create( Request $request )
    {
        $request->validate( [
            'firstName'  => 'required|string',
            'lastName'   => 'required|string',
            'id_number'  => 'required|string',
            'email'      => 'required|email',
            'membership' => 'required|string',
            'start'      => 'required|string',
        ] );

        $member = new Member;
        $member->firstName = $request->firstName;
        $member->lastName = $request->lastName;
        $member->id_number = $request->id_number;
        $member->email = $request->email;
        $member->membership = $request->membership;
        $member->start = $request->start;
        $member->save();

        return [ 'success' => 'Ny medlem skapad!' ];
    }
}
