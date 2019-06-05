<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasSlug;

    protected $table = 'songs';

    public static function create( Request $request )
    {
        $request->validate( [
            'title'  => 'required|string',
            'text'   => 'required|string',
            'melody'  => 'required|string',
        ] );

        $song = new Song;

        $song->title = $request->title;
        $song->text = $request->text;
        $song->melody = $request->melody;
        $song->save();
    }

    public static function updateInfo( Song $song, Request $request )
    {
        $request->validate( [
            'title'  => 'required|string',
            'text'   => 'required|string',
            'melody'  => 'required|string',
        ] );

        $song->title = $request->title;
        $song->text = $request->text;
        $song->melody = $request->melody;
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
