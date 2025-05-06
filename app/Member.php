<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use LindaCarlstad\LaravelLoggable\Loggable;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\MemberFactory;

class Member extends Model
{
    protected $table = 'members';

    use HasFactory;
    use Loggable;

    /** Specified actions for this model */
    public $loggable_actions = [ 'edit', 'create', 'delete' ];

    /** Specified fields for this model */
    public $loggable_fields  = [ 'firstName', 'lastName', 'id_number', 'email', 'membership' ];

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
        ] );
    }

    private static function addValuesToObject( $member, $request )
    {
        $member->firstName = $request->firstName;
        $member->lastName = $request->lastName;
        $member->id_number = $request->id_number;
        $member->email = $request->email;
        $member->membership = $request->membership;
        $member->save();
    }
}
