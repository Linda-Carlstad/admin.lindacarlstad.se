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
        return $this->hasOne('App\Initiation');
    }

    public static function create( Request $request )
    {
        InitiationDay::validateRequest( $request );
        $day = new InitiationDay;
        InitiationDay::addValuesToObject( $day, $request );
    }

    public static function updateInfo( InitiationDay $day, Request $request )
    {
        InitiationDay::validateRequest( $request );
        InitiationDay::addValuesToObject( $day, $request );
    }

    public static function validateRequest( Request $request )
    {
        $request->validate( [
            'title' => 'string|required',
            'description' => 'string|nullable',
            'extra' => 'string|nullable',
            'date' => 'string|nullable',
            'time' => 'string|nullable',
            'location' => 'string|nullable',
            'order' => 'integer|nullable',
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
        $day->order = $request->order;
        $day->initiation_id = $request->initiation_id;
        $day->save();
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom( 'title' )
            ->saveSlugsTo( 'slug' )
            ->usingSeparator( '-' );
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
