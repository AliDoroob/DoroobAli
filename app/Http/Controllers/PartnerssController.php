<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Partner; // Import the Partner model




class PartnerssController extends Controller
{
    
    public function show()
    {
        $partners = Partner::all(); 

        return view('partners', compact('partners'));
    }



    
}

