<?php

namespace App;

use Alkhachatryan\LaravelLoggable\Loggable;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class InitiationKeyPerson extends Model
{
    protected $table = 'initiation_key_people';

    public function initiation() {
        return $this->hasOne('App\Initiation');
    }

    use Loggable;

    /** Specified actions for this model */
    public $loggable_actions = [ 'edit', 'create', 'delete' ];

    /** Specified fields for this model */
    public $loggable_fields  = [ 'name', 'rank', 'email', 'phone' ];

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
            'email' => 'email|nullable',
            'phone' => 'string|nullable',
            'initiation_id' => 'integer|required'
        ] );
    }

    public static function addValuesToObject( InitiationKeyPerson $person, Request $request )
    {
        $person->name = $request->name;
        $person->rank = $request->rank;
        $person->email = $request->email;
        $person->phone = $request->phone;
        $person->initiation_id = $request->initiation_id;
        $person->save();
    }
}
