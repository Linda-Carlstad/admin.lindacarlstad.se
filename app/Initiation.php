<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Initiation extends Model
{
    protected $table = 'initiations';
    //

    public function days(){
        return $this->hasMany('App\InitiationDay');
    }

    public function persons(){
        return $this->hasMany('App\InitiationKeyPerson');
    }

    public static function create( Request $request )
    {
        Initiation::validateRequest( $request );
        $initiation = new Initiation;
        Initiation::addValuesToObject( $initiation, $request );
    }

    public static function updateInfo( Initiation $initiation, Request $request )
    {
        Initiation::validateRequest( $request );
        Initiation::addValuesToObject( $initiation, $request );
    }

    public static function validateRequest( Request $request )
    {
        $request->validate( [
            'year' => 'string|required',
            'description' => 'string|nullable',
            'price' => 'integer|nullable',
            'show_price' => 'boolean|nullable',
            'facebook_group' => 'string|nullable',
        ] );
    }

    public static function addValuesToObject( Initiation $initiation, Request $request )
    {
        $initiation->year = $request->year;
        $initiation->description = $request->description;
        $initiation->price = $request->price;
        $initiation->show_price = $request->show_price;
        $initiation->facebook_group = $request->facebook_group;
        $initiation->save();
    }
}
