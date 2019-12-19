<?php

namespace App\Http\Controllers;

use App\InitiationShirts;
use Illuminate\Http\Request;

class UpdateInitiationShirtsCount extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $shirts = InitiationShirts::all();
        $inputs = $request->all();

        $request->validate( [
            'S'   => 'required|integer|min:0',
            'M'   => 'required|integer|min:0',
            'L'   => 'required|integer|min:0',
            'XL'  => 'required|integer|min:0',
            'XXL' => 'required|integer|min:0',
        ] );

        foreach( $shirts as $shirt )
        {
            foreach( $inputs as $key => $value )
            {
                if( $shirt->size == $key )
                {
                    $shirt->quantity = $value;
                    $shirt->save();
                }
            }
        }

        return redirect()->back()->with( 'success', 'Nolletröjor uppdaterade!' );
    }
}
