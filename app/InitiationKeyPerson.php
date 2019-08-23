<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class InitiationKeyPerson extends Model
{
    protected $table = 'initiation_key_people';

    public static function create( Request $request )
    {
        InitiationKeyPerson::validateRequest( $request );
        $person = new InitiationKeyPerson;
        InitiationKeyPerson::addValuesToObject( $person, $request );
    }

    public static function updateInfo( InitiationKeyPerson $person, Request $request )
    {
        InitiationKeyPerson::validateRequest( $request );
        InitiationKeyPerson::addValuesToObject( $person, $request );
    }

    public static function validateRequest( Request $request )
    {
        $request->validate( [
            'name' => 'string|required',
            'rank' => 'string|required',
            'email' => 'email',
            'phone' => 'string',
        ] );
    }

    public static function addValuesToObject( InitiationKeyPerson $person, Request $request )
    {
        $person->name = $request->name;
        $person->rank = $request->rank;
        $person->email = $request->email;
        $person->phone = $request->phone;
        $person->save();
    }
}
