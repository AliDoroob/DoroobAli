<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;


class PartnerallController extends Controller
{
    //
  
    public function showAllPartners()
    {
        $partners = Partner::all();
        return view('doroob', compact('partners'));
    }
    
}
