<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partners';

    use HasSlug;

    public static function create( Request $request )
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'type' => 'required|string',
            'frontPage' => 'required|boolean',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'started' => 'required|integer',
        ]);

        $partner = new Partner;
        $partner->name = $request->name;
        $partner->description = $request->description;
        $partner->type = $request->type;
        $partner->frontPage = $request->frontPage;
        $partner->phone = $request->phone;
        $partner->email = $request->email;
        $partner->started = $request->started;
        $partner->save();
    }

    public static function updateInfo( Partner $partner, Request $request )
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'type' => 'required|string',
            'frontPage' => 'required|boolean',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'started' => 'required|integer',
        ]);

        $partner->name = $request->name;
        $partner->description = $request->description;
        $partner->type = $request->type;
        $partner->frontPage = $request->frontPage;
        $partner->phone = $request->phone;
        $partner->email = $request->email;
        $partner->started = $request->started;
        $partner->save();
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom( 'name' )
            ->saveSlugsTo( 'slug' )
            ->usingSeparator( '-' );
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
