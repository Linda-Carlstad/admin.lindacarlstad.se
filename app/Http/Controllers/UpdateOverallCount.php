<?php

namespace App\Http\Controllers;

use App\Overall;
use Illuminate\Http\Request;

class UpdateOverallCount extends Controller
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
        $inputs = $request->all();

        $request->validate( [
            'S'   => 'required|integer|min:0',
            'M'   => 'required|integer|min:0',
            'L'   => 'required|integer|min:0',
            'XL'  => 'required|integer|min:0',
            'XXL' => 'required|integer|min:0',
        ] );

        foreach( $overalls as $overall )
        {
            foreach( $inputs as $key => $value )
            {
                if( $overall->size == $key )
                {
                    $overall->quantity = $value;
                    $overall->save();
                }
            }
        }

        return redirect()->back()->with( 'success', 'Overaller uppdaterade!' );
    }
}
