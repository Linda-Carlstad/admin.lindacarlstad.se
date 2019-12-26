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
            'text' => 'string|required',
            'link' => 'string|nullable',
            'link_title' => 'string|nullable',
        ] );
    }

    public static function addValuesToObject( Event $event, Request $request )
    {
        $event->title = $request->title;
        $event->text = $request->text;
        $event->link = $request->link;
        $event->link_title = $request->link_title;
        $event->active = $request->active ? 1 : 0;
        $event->save();
    }
}
