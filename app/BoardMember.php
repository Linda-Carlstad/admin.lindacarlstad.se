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
            'name' => 'string',
            'description' => 'string',
            'email' => 'email|required',
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

    public function updateInfo( BoardMember $boardMember, Request $request )
    {
        $request->validate( [
            'title' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'description' => 'required|string',
            'order' => 'required|integer',
        ] );

        $boardMember->title = $request->title;
        $boardMember->name = $request->name;
        $boardMember->email = $request->email;
        $boardMember->description = $request->description;
        $boardMember->order = $request->order;
        $boardMember->save();
    }
}
