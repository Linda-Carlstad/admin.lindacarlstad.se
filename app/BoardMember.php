<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class BoardMember extends Model
{
    public function create( Request $request )
    {
        $request->validate( [
            'title' => 'string|required',
            'name' => 'string|required',
            'email' => 'email',
            'description' => 'string',
            'order' => 'integer',
        ] );

        $boardMember = new BoardMember;
        $boardMember->title = $request->title;
        $boardMember->name = $request->name;
        $boardMember->description = $request->description;
        $boardMember->email = $request->email;
        $boardMember->order = $request->order;
        $boardMember->save();
    }

    public static function updateInfo( BoardMember $boardMember, Request $request )
    {
        $request->validate( [
            'title' => 'string|required',
            'name' => 'string|required',
            'email' => 'email',
            'description' => 'string',
            'order' => 'integer',
        ] );
        
        $boardMember->title = $request->title;
        $boardMember->name = $request->name;
        $boardMember->email = $request->email;
        $boardMember->description = $request->description;
        $boardMember->order = $request->order;
        $boardMember->save();
    }
}
