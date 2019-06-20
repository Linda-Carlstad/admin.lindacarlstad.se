<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    public static function create( Request $request )
    {
        Member::validateRequest( $request );
        $member = new Member;
        Member::addValuesToObject( $member, $request );

        return [ 'success' => 'Ny medlem skapad!' ];
    }

    public static function updateInfo( Member $member, Request $request )
    {
        Member::validateRequest( $request );
        Member::addValuesToObject( $member, $request );
    }

    private static function validateRequest( Request $request )
    {
        $request->validate( [
            'firstName'  => 'required|string',
            'lastName'   => 'required|string',
            'id_number'  => 'required|string',
            'email'      => 'required|email',
            'membership' => 'required|string',
            'start'      => 'required|string',
        ] );
    }

    private static function addValuesToObject( Member $member, Request $request )
    {
        $member->firstName = $request->firstName;
        $member->lastName = $request->lastName;
        $member->id_number = $request->id_number;
        $member->email = $request->email;
        $member->membership = $request->membership;
        $member->start = $request->start;
        $member->save();
    }
}
