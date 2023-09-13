<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section; // Import the Section model
use App\Models\Service;
use App\Models\News; // Import the Section model
use App\Models\Business;
use App\Models\Project;
use App\Models\Statistic;
use App\Models\Partner;

class SectionController extends Controller
{
    public function index()
    {
        // Retrieve all sections from the database
        $sections = Section::all();
        $services = Service::all();
        $news = News::all();
        $busnisses = Business::all();
        $projects = Project::all();
        $statistics = Statistic::all();
        $partners = Partner::all();

        // Pass the sections data to a view for rendering using compact
        return view('sections', compact('sections','services','news','busnisses','projects','statistics','partners'));

    }
}
