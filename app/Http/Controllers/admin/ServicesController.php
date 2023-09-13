<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Section;


class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function create($section_id)
    {
        $section = Section::find($section_id);
        return view('admin.services.create', compact('section'));
    }
    
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'gif' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
    
        $validatedData['section_id'] = $request->input('section_id');
    
        if ($request->hasFile('gif')) {
            $image = $request->file('gif');
            $imageName = $image->getClientOriginalName(); // Get the original file name
            $image->move('public/images', $imageName);     // Move the uploaded file to a directory
            $validatedData['gif'] = $imageName;          // Save the complete image name in validated data
        }
    
    
        Service::create($validatedData);
    
        return back()->with('success', 'تمت اضافة الخدمة بنجاح');
    }
    

    
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }



    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'description' => 'required',
            'gif' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $service = Service::findOrFail($id);

        // Handle image upload
        if ($request->hasFile('gif')) {
            $image = $request->file('gif');
            $imageName = $image->getClientOriginalName(); 
         $request->file('gif')->move('public/images', $imageName); // Move the image to the desired directory
            $data['gif'] = $imageName;
        }

        $service->update($data);

        return back()->with('success', 'تم تحديث الخدمة بنجاح');
    }



    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return back()->with('success', 'تم حذف الخدمة بنجاح');
    }
    


    public function sectionServices($section_id)
{
    
    $section = Section::findOrFail($section_id);

   
    $services = $section->services;

    return view('admin.services.index', compact('services', 'section'));
}


public function updateSectionServiceVisibility(Request $request, $section_id)
{
    $section = Section::findOrFail($section_id);
    $visibility = $request->visibility;
    
    if ($visibility === 'is_visible' || $visibility === 'not_visible') {
        $section->services()->update(['is_visible' => $visibility]);
    }

    return back()->with('success', 'تم تحديث حالة الخدمات في القسم بنجاح.');
}



public function updateSectionBusinessesVisibility(Request $request, $section_id)
{
    $section = Section::findOrFail($section_id);
    $visibility = $request->visibility;
    
    if ($visibility === 'is_visible' || $visibility === 'not_visible') {
        $section->businesses()->update(['is_visible' => $visibility]);
    }

    return back()->with('success', 'تم تحديث حالة معرض الأعمال في القسم بنجاح.');
}



public function updateSectionProjectsVisibility(Request $request, $section_id)
{
    $section = Section::findOrFail($section_id);
    $visibility = $request->visibility;
    
    if ($visibility === 'is_visible' || $visibility === 'not_visible') {
        $section->projects()->update(['is_visible' => $visibility]);
    }

    return back()->with('success', 'تم تحديث حالة المشاريع في القسم بنجاح.');
}



public function updateSectionNewsVisibility(Request $request, $section_id)
{
    $section = Section::findOrFail($section_id);
    $visibility = $request->visibility;
    
    if ($visibility === 'is_visible' || $visibility === 'not_visible') {
        $section->news()->update(['is_visible' => $visibility]);
    }

    return back()->with('success', 'تم تحديث حالة الأخبار في القسم بنجاح.');
}



public function updateSectionPartnersVisibility(Request $request, $section_id)
{
    $section = Section::findOrFail($section_id);
    $visibility = $request->visibility;

    if ($visibility === 'is_visible' || $visibility === 'not_visible') {
        $section->partners()->update(['is_visible' => $visibility]);
    }

    return back()->with('success', 'تم تحديث حالة الشركاء في القسم بنجاح.');
}




public function updateSectionStatisticsVisibility(Request $request, $section_id)
{
    $section = Section::findOrFail($section_id);
    $visibility = $request->visibility;

    if ($visibility === 'is_visible' || $visibility === 'not_visible') {
        $section->statistics()->update(['is_visible' => $visibility]);
    }

    return back()->with('success', 'تم تحديث حالة الإحصائيات في القسم بنجاح.');
}







}
