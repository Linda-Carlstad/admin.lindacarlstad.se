<?php

namespace App\Http\Controllers;

use App\InitiationInformation;

use Illuminate\Http\Request;

class UpdateInitiationInformation extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        InitiationInformation::updateInfo( $request );

        return redirect()->action('InitiationDaysController@index')->with( 'success', 'Information uppdaterad.' );
    }
}
