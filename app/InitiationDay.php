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

    public static function create( Request $request )
    {
        $request->validate( [
            'title' => 'string|required',
            'description' => 'string',
            'extra' => 'string',
            'date' => 'string',
            'time' => 'string',
            'location' => 'string',
            'order' => 'integer',
        ] );

        $day = new InitiationDay;
        $day->title = $request->title;
        $day->description = $request->description;
        $day->extra = $request->extra;
        $day->date = $request->date;
        $day->time = $request->time;
        $day->location = $request->location;
        $day->order = $request->order;
        $day->save();
    }

    public static function updateInfo( InitiationDay $day, Request $request )
    {
        $request->validate( [
            'title' => 'string|required',
            'description' => 'string',
            'extra' => 'string',
            'date' => 'string',
            'time' => 'string',
            'location' => 'string',
            'order' => 'integer',
        ] );

        $day->title = $request->title;
        $day->description = $request->description;
        $day->extra = $request->extra;
        $day->date = $request->date;
        $day->time = $request->time;
        $day->location = $request->location;
        $day->order = $request->order;
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
