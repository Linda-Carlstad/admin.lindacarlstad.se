<?php

namespace App;

use LindaCarlstad\LaravelLoggable\Loggable;
use Illuminate\Database\Eloquent\Model;

class ModelLogs extends Model
{
    use Loggable;

    protected $table = 'model_logs';

    public $loggable_actions = [];
    public $loggable_fields  = [];
}
