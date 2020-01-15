<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class InitiationDay extends Model
{
    use HasSlug;

    protected $table = 'initiation_days';
    //

    public function initiation() {
        return $this->belongsTo('App\Initiation');
    }

    public static function create( Request $request )
    {
        InitiationDay::validateRequest( $request );
        $day = new InitiationDay;
        $request->location = InitiationDay::parseGoogleMapsLink( $request->location );
        InitiationDay::addValuesToObject( $day, $request );
    }

    public static function updateInfo( InitiationDay $day, Request $request )
    {
        InitiationDay::validateRequest( $request );
        $request->location = InitiationDay::parseGoogleMapsLink( $request->location );
        InitiationDay::addValuesToObject( $day, $request );
    }

    public static function validateRequest( Request $request )
    {
        if( $request->date )
        {
            $request->date = date_format( date_create( $request->date ), 'Y-m-d H:i:s' );
        }

        $request->validate( [
            'title' => 'string|required',
            'description' => 'string|nullable',
            'extra' => 'string|nullable',
            'date' => 'date|nullable',
            'time' => 'string|nullable',
            'location' => 'string|nullable',
            'initiation_id' => 'integer|required',
        ] );
    }

    public static function addValuesToObject( InitiationDay $day, Request $request )
    {
        $day->title = $request->title;
        $day->description = $request->description;
        $day->extra = $request->extra;
        $day->date = $request->date;
        $day->time = $request->time;
        $day->location = $request->location;
        $day->initiation_id = $request->initiation_id;
        $day->save();
    }

    public static function parseGoogleMapsLink( $link )
    {
        $temp = explode('"', $link);
        if( count($temp) === 1 )
        {
            return $temp[0];
        }
        else
        {
            return $temp[1];
        }
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom( 'title' )
            ->saveSlugsTo( 'slug' )
            ->usingSeparator( '-' )
            ->allowDuplicateSlugs();;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
