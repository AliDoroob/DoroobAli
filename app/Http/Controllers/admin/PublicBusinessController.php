<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\Section;

class PublicBusinessController extends Controller
{
    public function index()
    {
        $businessPublic = Business::paginate(10); // 10 items per page
        return view('admin.business_public.index', compact('businessPublic'));
    }

    public function create()
    {
        $sections = Section::all();
        return view('admin.business_public.create', compact('sections'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'section_id' => 'required',
            'news_id' => 'array', // Ensure news_id is an array
            'datetime' => 'required|date_format:Y-m-d\TH:i',
            'content' => 'required|string', // Add validation for the content field
            'youtube_link' => 'nullable|string',
        ]);
    
        // Handle the image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move('public/images', $imageName);
            $validatedData['image'] = $imageName;
        }
    
        // Handle the YouTube link
        if ($request->filled('youtube_link')) {
            // Validate and extract the YouTube video ID from the link
            $videoId = $this->extractYouTubeVideoIdFromLink($request->input('youtube_link'));
    
            // Save the YouTube video ID in the database
            $validatedData['youtube_link'] = $videoId;
        }
    
        // Create the business article
        $business = Business::create($validatedData);
        $business->is_public = $request->input('is_public');
    
        if ($request->has('section_id')) {
            $business->section_id = $request->input('section_id');
            $business->save();
        }
    
        // Check if "news_id" is provided and attach them
      if ($request->has('news_id')) {
            $business->news_id = $request->input('news_id');
            $business->save();
        }
    
        $datetime = \Carbon\Carbon::parse($request->input('datetime'));
        $business->datetime = $datetime;
        $business->save();
    
        // Assign the content to the business article
        $business->content = $request->input('content');
        $business->save();
    
        // Continue with other business logic
    
        return redirect()->route('admin.business_public.create')
            ->with('success', 'تم اضافة العمل بنجاح');
    }
    
    // Helper function to extract YouTube video ID from a URL
    private function extractYouTubeVideoIdFromLink($link)
    {
        $videoId = '';
        // Use regular expression to extract the video ID from the link
        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/';
        if (preg_match($pattern, $link, $matches)) {
            $videoId = $matches[1];
        }
        return $videoId;
    }
    
    
    public function edit($id)
    {
        $sections = Section::all(); // Fetch all sections from the database
        $business = Business::findOrFail($id);
        return view('admin.business_public.edit', compact('business', 'sections'));
    }

    // Update an existing Business model
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'section_id' => 'required',
            'news_id' => 'array', // Ensure news_id is an array
            'datetime' => 'required|date_format:Y-m-d\TH:i',
            'content' => 'required|string', // Add validation for the content field
            'youtube_link' => 'nullable|string',
        ]);

        // Find the Business model instance by ID
        $business = Business::findOrFail($id);

        // Handle the image upload if a new image is provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move('public/images', $imageName);
            $business->image = $imageName;
        }

        // Handle the YouTube link
        if ($request->filled('youtube_link')) {
            // Validate and extract the YouTube video ID from the link
            $videoId = $this->extractYouTubeVideoIdFromLink($request->input('youtube_link'));

            // Save the YouTube video ID in the database
            $business->youtube_link = $videoId;
        } else {
            // If no YouTube link is provided, you may want to clear the youtube_video_id field
            $business->youtube_link = null;
        }

        // Update the Business model with the new data
        $business->update($validatedData);
        $business->is_public = $request->input('is_public');

        if ($request->has('section_id')) {
            $business->section_id = $request->input('section_id');
        }

        // Check if "news_id" is provided and attach them
        if ($request->has('news_id')) {
            $business->news_id = $request->input('news_id');
        }

        $datetime = \Carbon\Carbon::parse($request->input('datetime'));
        $business->datetime = $datetime;

        // Assign the content to the business article
        $business->content = $request->input('content');

        // Save the updated Business model
        $business->save();

        // Continue with other business logic

        return redirect()->route('admin.business_public.edit', $id)
            ->with('success', 'تم تحديث العمل بنجاح');
    }

    public function destroy($id)
    {
        $business = Business::findOrFail($id);
        $business->delete();

        return redirect()->route('admin.business_public.index')
            ->with('success', 'تم حذف العمل بنجاح');
    }


public function show(){
    $businessPublic = Business::where('is_public',true  ) ->get(); ;
    return view('business_public', compact('businessPublic'));
}
}
