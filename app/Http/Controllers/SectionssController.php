<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section; // Import your Section model if it's in a different namespace
use App\Models\News; // Import the Section model
use App\Models\Business;
use App\Models\Project;
use App\Models\Statistic;
use App\Models\Partner;
use App\Models\Service;

class SectionssController extends Controller
{
    //
public function showDoroobSection()
{
    // Retrieve all data from the 'sections' table
    $sectionData = Section::all();
    $news = News::orderBy('datetime', 'desc')->take(4)->get();
    $partners = Partner::all();
    $business = Business::with('section')
    ->get()
    ->unique('section_id')
    ->values();
    return view('doroob', ['sectionData' => $sectionData,'news' =>$news,'partners' =>$partners,'business' =>$business]);
   
}
public function show(Request $request, $section_id)
{  
    $section = Section::find($section_id);
    $services = Service::where('section_id', $section_id)->get();
    $currentDatetime = now();
    $currentDatetime->addHours(3); 
    $currentDatetimeString = $currentDatetime->format('Y-m-d H:i:s');
        $news = News::where('news_id', 'LIKE', "%{$section_id}%")
        ->orWhere('section_id', $section_id)
        ->where('is_visible', true)
        ->where('datetime', '<=', $currentDatetimeString)
        ->get();
    $busnisses = Business::where('news_id', 'LIKE', "%{$section_id}%")
    ->orWhere('section_id', $section_id)
    ->where('is_visible', true)
    ->where('datetime', '<=', $currentDatetimeString)
    ->latest('updated_at') // Order by the most recent updated_at
    ->limit(4)  // Limit the results to the last four records
    ->get();
    $projects = Project::where('section_id', $section_id)->get();
    $statistics = Statistic::where('section_id', $section_id)->get();
    $partners = Partner::all();
    return view('sections', compact('section', 'services', 'news', 'busnisses', 'projects', 'statistics', 'partners'));
}
public function showBusiness(Request $request, $section_id)
{
    $section = Section::find($section_id);
    $businesses = Business::where('section_id', $section_id)
    ->where('is_visible', true)
    ->get();

    return view('businesses', compact('businesses'));
}


public function showOwnBusiness($id)
{

    $business = Business::find($id);

    // Check if the business exists
    if (!$business) {
        abort(404); // Display a 404 error if the business is not found
    }

    // Return the view with the business details
    return view('businessesown', compact('business'));
}
public function showNews(Request $request, $section_id)
{
    $section = Section::find($section_id);
    $news = News::where('section_id', $section_id)
    ->where('is_visible', true)
    ->get();

    return view('news', compact('news'));
}

public function showOwnNews($id)
{

    $news = News::find($id);

    // Check if the business exists
    if (!$news) {
        abort(404); // Display a 404 error if the business is not found
    }

    // Return the view with the business details
    return view('newsown', compact('news'));
}
}
