<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class InitiationKeyPerson extends Model
{
    protected $table = 'initiation_key_people';

    public static function create( Request $request )
    {
        $request->validate( [
            'name' => 'string|required',
            'rank' => 'string|required',
            'email' => 'string',
            'phone' => 'string',
        ] );

        $person = new InitiationKeyPerson;
        $person->name = $request->name;
        $person->rank = $request->rank;
        $person->email = $request->email;
        $person->phone = $request->phone;
        $person->save();
    }

    public static function updateInfo( InitiationKeyPerson $person, Request $request )
    {
        $request->validate( [
            'name' => 'string|required',
            'rank' => 'string|required',
            'email' => 'email',
            'phone' => 'string',
        ] );

        $person->name = $request->name;
        $person->rank = $request->rank;
        $person->email = $request->email;
        $person->phone = $request->phone;
        $person->save();
    }
}
