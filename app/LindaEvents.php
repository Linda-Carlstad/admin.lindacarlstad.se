<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;


class LindaEvents extends Model
{
    use HasFactory;

   protected $table = 'linda_events';

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'name',
       'starts',
       'ends',
       'status',
       'summary',
       'location',
       'uid'
   ];
  
   /**
    * The rules for data entry
    *
    * @var array
    */
   public static $rules = [
       'name' => 'required',
       'starts' => 'required',
       'ends' => 'required',
       'status' => 'required',
       'summary' => 'required',
       'location' => 'required',
       'uid' => 'required'
   ];
   
    // Automatically generate the UID when creating a new event
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($event) {
            $event->uid = uniqid() . '@' . request()->getHost();
        });
    }
}