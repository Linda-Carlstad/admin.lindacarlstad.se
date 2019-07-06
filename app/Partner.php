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
        Partner::validateRequest( $request );
        if( empty( $request->image ) )
        {
            $imageName = '/img/logo.png';
        }
        else
        {
            $imageName = Partner::setImageName( $request );
        }
        $partner = new Partner;
        Partner::addValuesToObject( $partner, $request, $imageName );
    }

    public static function updateInfo( Partner $partner, Request $request )
    {
        Partner::validateRequest( $request );
        if( empty( $request->image ) )
        {
            $imageName = '/img/logo.png';
        }
        else
        {
            $imageName = Partner::setImageName( $request );
        }
        Partner::addValuesToObject( $partner, $request, $imageName );
    }

    public static function validateRequest( Request $request )
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'link' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type' => 'required|string',
            'frontPage' => 'required|boolean',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'started' => 'required|integer',
        ]);
    }

    public static function setImageName( Request $request )
    {
        $name = str_slug( $request->name ) . '-' . time() . '.' . $request->image->getClientOriginalExtension();
        $folder = '/img/partners/';
        $request->image->move( public_path( $folder ), $name );
        $imageName = $folder . $name;
        return $imageName;
    }

    public static function addValuesToObject( Partner $partner, Request $request, $imageName )
    {
        $partner->name = $request->name;
        $partner->description = $request->description;
        $partner->link = $request->link;
        $partner->image = $imageName;
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