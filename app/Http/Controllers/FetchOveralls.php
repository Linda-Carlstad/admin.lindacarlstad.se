<?php

namespace App\Http\Controllers;

use App\Overall;
use Illuminate\Http\Request;

class FetchOveralls extends Controller
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

        return view( 'overall.index' )->with( 'overalls', $overalls );
    }
}
