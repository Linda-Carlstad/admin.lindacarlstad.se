<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class BoardMember extends Model
{
    public function create( Request $request )
    {
        BoardMember::validateRequest( $request );
        if( empty( $request->image ) )
        {
            $image = 'img/logo.png';
        }
        else
        {
            $image = Partner::setImageName( $request );
        }
        $boardMember = new BoardMember;
        BoardMember::addValuesToObject( $boardMember, $request, $image );
    }

    public static function updateInfo( BoardMember $boardMember, Request $request )
    {
        BoardMember::validateRequest( $request );
        if( empty( $boardMember->image ) )
        {
            if( empty( $request->image ) )
            {
                $image = '/img/logo.png';
            }
            else
            {
                $image = BoardMember::setImageName( $request );
            }
        }
        else
        {
            $image = $partner->image;
        }

        BoardMember::addValuesToObject( $boardMember, $request, $image );
    }

    public static function validateRequest( Request $request )
    {
        $request->validate( [
            'title' => 'required|string',
            'name' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|email',
            'description' => 'required|string',
            'order' => 'required|integer',
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

    public static function addValuesToObject( BoardMember $boardMember, Request $request, $image )
    {
        $boardMember->title = $request->title;
        $boardMember->name = $request->name;
        $boardMember->image = $image;
        $boardMember->email = $request->email;
        $boardMember->description = $request->description;
        $boardMember->order = $request->order;
        $boardMember->save();
    }
}
