<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Association extends Model
{
    use HasSlug;

    protected $table = 'associations';

    public static function create( Request $request )
    {
        Association::validateRequest( $request );
        if( empty( $request->image ) )
        {
            $image = 'img/logo.png';
        }
        else
        {
            $image = Association::setImageName( $request );
        }
        $association = new Association;
        Association::addValuesToObject( $association, $request, $image );
    }

    public static function updateInfo( Association $association, Request $request )
    {
        Association::validateRequest( $request );

        if( $request->image )
        {
            $image = Association::setImageName( $request );
        }
        else if( $association->image )
        {
            $image = $association->image;
        }
        else
        {
            $image = '/img/logo.png';
        }

        Association::addValuesToObject( $association, $request, $image );
    }

    public static function validateRequest( Request $request )
    {
        $request->validate( [
            'name' => 'required|string',
            'slogan' => 'nullable|string',
            'link' => 'nullable|string',
            'description' => 'nullable|string',
            'email' => 'nullable|email',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ] );
    }

    public static function setImageName( Request $request )
    {
        $name = str_slug( $request->title ) . '-' . time() . '.' . $request->image->getClientOriginalExtension();
        $folder = '/img/association/';
        $request->image->move( public_path( $folder ), $name );
        $image = $folder . $name;
        return $image;
    }

    public static function addValuesToObject( Association $association, Request $request, $image )
    {
        $association->name = $request->name;
        $association->slogan = $request->slogan;
        $association->image = $image;
        $association->email = $request->email;
        $association->link = $request->link;
        $association->description = $request->description;
        $association->save();
    }


    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom( 'name' )
            ->saveSlugsTo( 'slug' )
            ->usingSeparator('-');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
