<?php

namespace App;

use Alkhachatryan\LaravelLoggable\Loggable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partners';

    use HasSlug;
    use Loggable;

    /** Specified actions for this model */
    public $loggable_actions = [ 'edit', 'create', 'delete' ];

    /** Specified fields for this model */
    public $loggable_fields  = [ 'name', 'description', 'link', 'image', 'type', 'frontPage', 'phone', 'email', 'started' ];

    public static function create( Request $request )
    {
        Partner::validateRequest( $request );
        if( empty( $request->image ) )
        {
            $image = '/img/logo.png';
        }
        else
        {
            $image = Partner::setImageName( $request );
        }
        $partner = new Partner;
        Partner::addValuesToObject( $partner, $request, $image );
    }

    public static function updateInfo( Partner $partner, Request $request )
    {
        Partner::validateRequest( $request );

        if( $request->image )
        {
            $image = Partner::setImageName( $request );
        }
        else if( $partner->image )
        {
            $image = $partner->image;
        }
        else
        {
            $image = '/img/logo.png';
        }

        Partner::addValuesToObject( $partner, $request, $image );
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
        $image = $folder . $name;
        return $image;
    }

    public static function addValuesToObject( Partner $partner, Request $request, $image )
    {
        $partner->name = $request->name;
        $partner->description = $request->description;
        $partner->link = $request->link;
        $partner->image = $image;
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
