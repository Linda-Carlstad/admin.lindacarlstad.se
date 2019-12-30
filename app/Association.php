<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Association extends Model
{
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
            'nickname' => 'nullable|string',
            'link' => 'nullable|string',
            'description' => 'nullable|string',
            'email' => 'nullable|email',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ] );
    }

    public static function setImageName( Request $request )
    {
        $name = str_slug( $request->title ) . '-' . time() . '.' . $request->image->getClientOriginalExtension();
        $folder = '/img/board/';
        $request->image->move( public_path( $folder ), $name );
        $image = $folder . $name;
        return $image;
    }

    public static function addValuesToObject( Association $association, Request $request, $image )
    {
        $association->name = $request->name;
        $association->nickname = $request->nickname;
        $association->image = $image;
        $association->email = $request->email;
        $association->description = $request->description;
        $association->save();
    }
}