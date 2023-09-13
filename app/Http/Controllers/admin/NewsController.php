<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Section;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $newsArticles = News::all(); 
        return view('admin.news.index', compact('newsArticles'));
    }
    

    public function create($section_id)
    
    {

        $section = Section::find($section_id);
        return view('admin.news.create', compact('section'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'description' => 'required',
        ]);
        $validatedData['section_id'] = $request->input('section_id');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName(); 
            $image->move('public/images', $imageName);   
            $validatedData['image'] = $imageName;       
        }
    
        News::create($validatedData);
    
       return back()->with('success', 'تمت اضافة الخبر بنجاح');
    }


    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $news = News::findOrFail($id);
    
        $news->update([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName(); // Use the original file name
            $image->move('public/images', $imageName);
            $data['image'] = $imageName;
    
            // Update the 'image' column in the database
            $news->update(['image' => $data['image']]);
        }
    
        return back()->with('success', 'تم تحديث الخبر بنجاح');
    }
    
    

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

       return back()->with('success', 'تم حذف الخبر بنجاح');
    }



    public function sectionNews($section_id)
    {
        $section = Section::findOrFail($section_id);
        $newsArticles = $section->news;
    
        return view('admin.news.index', compact('newsArticles', 'section'));
    }
}
