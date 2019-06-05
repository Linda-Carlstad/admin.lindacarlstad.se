<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partners';

    use HasSlug;

    public static function create( Request $request )
    {
        $request->validate([
            'name' => 'required|string',
            ''
        ]);
    }
}
