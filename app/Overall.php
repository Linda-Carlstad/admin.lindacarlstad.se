<?php

namespace App;

use Alkhachatryan\LaravelLoggable\Loggable;
use Illuminate\Database\Eloquent\Model;

class Overall extends Model
{
    use Loggable;

    /** Specified actions for this model */
    public $loggable_actions = [ 'edit' ];

    /** Specified fields for this model */
    public $loggable_fields  = [ 'size', 'quantity' ];
}
