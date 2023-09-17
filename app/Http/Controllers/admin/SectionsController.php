<?php

namespace App\Http\Controllers\admin;

use App\Models\Section;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SectionsController extends Controller
{
    

    public function index()
    {
        $sections = Section::all();
        return view('admin.sections.index', compact('sections'));
    }

    public function create()
    {

        return view('admin.sections.create');
    }



    public function store(Request $request)
    {
        if (count($request->file('gifs')) !== 3) {
            return redirect()->route('admin.sections.create')
                ->withInput()
                ->withErrors(['gifs' => 'يجب ادخال ثلاثة صور']);
        }
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required', 
            'gifs' => 'required|array|size:3',
            'gifs.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tiny_description' => 'required|string|max:30',
            'tiny_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate tiny_image
          
        ]);

        
        
        $section = new Section();
        $section->name = $validatedData['name'];
        $section->description = $validatedData['description'];
        $section->tiny_description = $validatedData['tiny_description'];

        if ($request->hasFile('gifs')) {
            $imageUrls = [];
    
            foreach ($request->file('gifs') as $image) {
                $imageName =  $image->getClientOriginalName();
                $image->move('storage/images', $imageName);
                $imageUrls[] = $imageName;
            }
    
            $section->gif = implode(',', $imageUrls);
        }
        if ($request->hasFile('tiny_image')) {
            $tinyImageName = $request->file('tiny_image')->getClientOriginalName();
            $request->file('tiny_image')->move('storage/images', $tinyImageName);
            $section->tiny_image = $tinyImageName;
        }
        $section->save();
    
        return redirect()->route('admin.sections.index')->with('success', 'تم إضافة القسم بنجاح');
    }
    
    public function edit($id)
    {
        $section = Section::findOrFail($id);
        return view('admin.sections.edit', compact('section'));
    }



    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'gifs' => 'required|array|size:3',
            'gifs.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                       
            'tiny_description' => 'required|string|max:30', 
'tiny_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate tiny_image
        ]);

        $section = Section::findOrFail($id);

        // التعامل مع رفع الصور
        if ($request->hasFile('gifs')) {
            $imageUrls = [];

            foreach ($request->file('gifs') as $image) {
                $imageName = $image->getClientOriginalName(); // استخدام اسم الملف الأصلي
                $image->move('storage/images', $imageName); // نقل الصورة إلى المسار المطلوب
                $imageUrls[] = $imageName;
            }

            $data['gif'] = implode(',', $imageUrls);
        }
        if ($request->hasFile('tiny_image')) {
            $tinyImageName = $request->file('tiny_image')->getClientOriginalName();
            $request->file('tiny_image')->move('storage/images', $tinyImageName);
            $section->tiny_image = $tinyImageName;
        }
        // تحديث القسم في قاعدة البيانات مع البيانات الجديدة بما في ذلك حقل الصورة المحدث
        $section->update($data);

        return redirect()->route('admin.sections.index')
                         ->with('success', 'تم تحديث القسم بنجاح');
    }

    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        $section->delete();

        return redirect()->route('admin.sections.index')
                         ->with('success', 'تم حذف القسم بنجاح');
    }



    public function showSectionDetails($id)
    {
        $section = Section::findOrFail($id);
        $services = $section->services;
        $newsArticles = $section->newsArticles;
        $businesses = $section->businesses;
        $projects = $section->projects;

        return view('admin.show_details', compact('section', 'services', 'newsArticles', 'businesses', 'projects'));
    }
    // When a user clicks the "Hide" button, update the visibility status in the database or session
    public function updateVisibility(Request $request)
    {
        $sectionId = $request->input('section_id');
        $visibility = $request->input('visibility');
    
        $section = Section::find($sectionId);
    
        if (!$section) {
            return redirect()->back()->with('error', 'Section not found');
        }
    
        // Update the visibility column
        $section->is_visible = $visibility;
        $section->save();
    
        return redirect()->back();
    }
    
    
}
