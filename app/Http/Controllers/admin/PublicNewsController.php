<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Section;

class PublicNewsController extends Controller
{
    //
    
    public function index()
    {
        $publicNews = News::paginate(10); // 10 items per page
        return view('admin.news_public.index', compact('publicNews'));
    }
    


    public function create()
    {
        $sections = Section::all();
        return view('admin.news_public.create', compact('sections'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'section_id' => 'required',
            'news_id' => 'array', // Ensure news_id is an array
            'datetime' => 'required|date_format:Y-m-d\TH:i',
            'content' => 'required|string', // Add validation for the content field
        ]);
    
        // Create the news article
        $news = News::create($validatedData);
    
        // Set the is_public property after creating the news article
        $news->is_public = $request->input('is_public');
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move('public/images', $imageName);
            $news->image = $imageName; // Update the image property
        }
    
        // Attach the selected main section to the news article
        if ($request->has('section_id')) {
            $news->section_id = $request->input('section_id');
            $news->save();
        }
    
        // Check if "news_id" is provided and attach them
        if ($request->has('news_id')) {
            $news->news_id = $request->input('news_id');
            $news->save();
        }
    
        // Parse the provided datetime and assign it to the news article
        $datetime = \Carbon\Carbon::parse($request->input('datetime'));
        $news->datetime = $datetime;
        $news->save();
    
        // Assign the content to the news article
        $news->content = $request->input('content');
        $news->save();
    
        return redirect()->route('admin.news_public.create')
            ->with('success', 'تم اضافة الخبر بنجاح');
    }
    
    public function edit($id)
    {
        $sections = Section::all(); // Fetch all sections from the database
        $news = News::findOrFail($id);
        return view('admin.news_public.edit', compact('news', 'sections'));
    }
    

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Allow image to be optional for updates
            'section_id' => 'required',
            'news_id' => 'array', // Ensure news_id is an array
            'datetime' => 'required|date_format:Y-m-d\TH:i', // Validate the date and time format
            'content' => 'required|string', // Add validation for the content field
        ]);
    
        // Find the news article by its ID
        $news = News::find($id);
    
        if (!$news) {
            // Handle the case where the news article is not found (e.g., show an error message or redirect)
            return redirect()->back()->with('error', 'الخبر غير موجود');
        }
    
        // Update the news article's attributes
        $news->name = $request->input('name');
        $news->description = $request->input('description');
        $news->section_id = $request->input('section_id');
        $news->content = $request->input('content');
    
        // Check if a new image is uploaded and update it
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move('public/images', $imageName);
            $news->image = $imageName;
        }
    
        // Parse the provided datetime and update it
        $datetime = \Carbon\Carbon::parse($request->input('datetime'));
        $news->datetime = $datetime;
    
        // Update the news_id (subsections)
        $news->news_id = $request->input('news_id');
        $news->is_public = $request->input('is_public');

        // Save the updated news article
        $news->save();
    
        return redirect()->route('admin.news_public.edit', ['id' => $news->id])
            ->with('success', 'تم تحديث الخبر بنجاح');
    }
    

public function destroy($id)
{
    $news = News::findOrFail($id);
    $news->delete();

    return redirect()->route('admin.news_public.index')
        ->with('success', 'تم حذف الخبر بنجاح');
}

}
