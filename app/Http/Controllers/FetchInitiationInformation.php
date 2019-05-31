<?php

namespace App\Http\Controllers;

use App\InitiationInformation;

use Illuminate\Http\Request;

class FetchInitiationInformation extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $information = InitiationInformation::first();

        return view( 'initiation.information' )->with( 'information', $information );
    }
}
