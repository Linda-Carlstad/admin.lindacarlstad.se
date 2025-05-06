<?php

namespace App;

use LindaCarlstad\LaravelLoggable\Loggable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = 'songs';

    use HasSlug;
    use Loggable;

    /** Specified actions for this model */
    public $loggable_actions = [ 'edit', 'create', 'delete' ];

    /** Specified fields for this model */
    public $loggable_fields  = [ 'title', 'text', 'melody', 'secret' ];

    public static function create( Request $request )
    {
        Song::validateRequest( $request );
        $song = new Song;
        Song::addValuesToObject( $song, $request );
    }

    public static function updateInfo( Song $song, Request $request )
    {
        Song::validateRequest( $request );
        Song::addValuesToObject( $song, $request );
    }

    private static function validateRequest( Request $request )
    {
        $request->validate( [
            'title'  => 'required|string',
            'text'   => 'required|string',
            'melody' => 'required|string',
            'secret' => 'nullable'
        ] );
    }

    private static function addValuesToObject( Song $song, Request $request )
    {
        $song->title = $request->title;
        $song->text = $request->text;
        $song->melody = $request->melody;
        $song->secret = $request->secret ? '1' : '0';
        $song->save();
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom( 'title' )
            ->saveSlugsTo( 'slug' )
            ->usingSeparator('-');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
