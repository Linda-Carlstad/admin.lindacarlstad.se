<?php

namespace App;

use Alkhachatryan\LaravelLoggable\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Event extends Model
{
    protected $table = 'events';

    use Loggable;

    /** Specified actions for this model */
    public $loggable_actions = [ 'edit', 'create', 'delete' ];

    /** Specified fields for this model */
    public $loggable_fields  = [ 'title', 'text', 'link', 'link_title' ];

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
        if( $request->active === null )
        {
            $request->active = 0;
        }

        $event->title = $request->title;
        $event->text = $request->text;
        $event->link = $request->link;
        $event->link_title = $request->link_title;
        $event->active = $request->active;
        $event->save();
    }
}
