<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlatpickrController extends Controller
{
    public function showForm()
    {
        return view('flatpickr');
    }

    public function saveDate(Request $request)
    {
        // Handle saving the selected date logic
        // $request->input('selected_date') contains the selected date
    }

}
