<?php

namespace App\Http\Controllers;

use App\Overall;
use App\InitiationShirts;
use Illuminate\Http\Request;

class FetchClothes extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $overalls = Overall::all();
        $shirts[ 'fadder' ] = InitiationShirts::where( 'type', 'fadder' )->get();
        $shirts[ 'nolla' ] = InitiationShirts::where( 'type', 'nolla' )->get();

        return view( 'clothes.index' )->with( 'overalls', $overalls )->with( 'shirts', $shirts );
    }
}
