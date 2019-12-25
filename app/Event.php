<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Event extends Model
{
    protected $table = 'events';

    public static function create( Request $request )
    {
        Event::validateRequest( $request );
        $event = new Event;
        Event::addValuesToObject( $event, $request );
    }

    public static function updateInfo( Event $event, Request $request )
    {
        Event::validateRequest( $request );
        Event::addValuesToObject( $event, $request );
    }

    public static function validateRequest( Request $request )
    {
        $request->validate( [
            'title' => 'string|required',
            'link' => 'string|nullable',
            'link_title' => 'string|nullable',
            'type' => 'string|nullable',
        ] );
    }

    public static function addValuesToObject( Event $event, Request $request )
    {
        $event->title = $request->title;
        $event->link = $request->link;
        $event->link_title = $request->link_title;
        $event->type = $request->type;
        $event->save();
    }
}
