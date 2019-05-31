<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class InitiationInformation extends Model
{
    protected $table = 'initiation_information';

    public static function updateInfo( Request $request )
    {
        $request->validate( [
            'description' => 'string|required',
            'price' => 'integer|required',
            'facebookGroup' => 'string|required',
        ] );

        $information = InitiationInformation::first();
        $information->description = $request->description;
        $information->price = $request->price;
        $information->facebookGroup = $request->facebookGroup;
        $information->save();
    }
}
