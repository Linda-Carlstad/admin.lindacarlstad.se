<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class InitiationInformation extends Model
{
    protected $table = 'initiation_information';

    public static function updateInfo( Request $request )
    {
        if( $request->has( 'showPrice' ) )
        {
            $request->showPrice = 1;
        }
        else {
            $request->showPrice = 0;
        }

        $request->validate( [
            'description' => 'string|required',
            'price' => 'integer|required',
            'facebookGroup' => 'string|required',
        ] );

        $information = InitiationInformation::first();
        $information->description = $request->description;
        $information->price = $request->price;
        $information->showPrice = $request->showPrice;
        $information->facebookGroup = $request->facebookGroup;
        $information->save();
    }
}
