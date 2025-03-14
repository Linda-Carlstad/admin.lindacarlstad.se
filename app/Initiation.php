<?php

namespace App;

use LindaCarlstad\LaravelLoggable\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Initiation extends Model
{
    use Loggable;

    protected $table = 'initiations';

    public function days(){
        return $this->hasMany('App\InitiationDay');
    }

    public function persons(){
        return $this->hasMany('App\InitiationKeyPerson');
    }

    /** Specified actions for this model */
    public $loggable_actions = [ 'edit', 'create', 'delete' ];

    /** Specified fields for this model */
    public $loggable_fields  = [ 'description', 'price', 'facebook_group', 'playlist' ];

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
        if( $request->playlist )
        {
            if( !strpos( $request->playlist, '/embed/' ) )
            {
                if( substr( $request->playlist, 0, 8 ) === 'spotify:' )
                {
                    $link = explode(":", $request->playlist);
                    $request->playlist = 'https://open.spotify.com/embed/playlist/' . $link[2];
                }
                else
                {
                    $link = explode("?", $request->playlist);
                    $request->playlist = $link[0];
                    $request->playlist = substr_replace($request->playlist, '/embed', 24, 0);
                }
            }
        }

        $request->validate( [
            'year' => 'string|required',
            'description' => 'string|nullable',
            'price' => 'integer|nullable',
            'show_price' => 'boolean|nullable',
            'facebook_group' => 'string|nullable',
            'playlist' => 'string|nullable',
            'active' => 'boolean'
        ] );
    }

    public static function addValuesToObject( Initiation $initiation, Request $request )
    {
        $initiation->year = $request->year;
        $initiation->description = $request->description;
        $initiation->price = $request->price;
        $initiation->show_price = $request->show_price;
        $initiation->facebook_group = $request->facebook_group;
        $initiation->playlist = $request->playlist;
        $initiation->active = $request->active == false ? false : true;
        $initiation->save();
    }
}
