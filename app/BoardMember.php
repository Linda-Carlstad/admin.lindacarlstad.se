<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class BoardMember extends Model
{
    public function create( Request $request )
    {
        dd( $request );
        BoardMember::validateRequest( $request );
        if( empty( $request->image ) )
        {
            $imageName = 'img/logo.png';
        }
        else
        {
            $imageName = Partner::setImageName( $request );
        }
        $boardMember = new BoardMember;
        BoardMember::addValuesToObject( $boardMember, $request, $imageName );
    }

    public static function updateInfo( BoardMember $boardMember, Request $request )
    {
        BoardMember::validateRequest( $request );
        if( empty( $request->image ) )
        {
            $imageName = 'img/logo.png';
        }
        else
        {
            $imageName = Partner::setImageName( $request );
        }
        BoardMember::addValuesToObject( $boardMember, $request, $imageName );
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
        $imageName = $folder . $name;
        return $imageName;
    }

    public static function addValuesToObject( BoardMember $boardMember, Request $request, $imageName )
    {
        $boardMember->title = $request->title;
        $boardMember->name = $request->name;
        $boardMember->image = $imageName;
        $boardMember->email = $request->email;
        $boardMember->description = $request->description;
        $boardMember->order = $request->order;
        $boardMember->save();
    }
}
