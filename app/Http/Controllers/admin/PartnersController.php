<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\Section;

class PartnersController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners.index', compact('partners'));
    }

    public function create($section_id)
{
    $section = Section::find($section_id);
    return view('admin.partners.create', compact('section'));
}

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move('public/images', $imageName);

        $validatedData['image'] = $imageName;

        $validatedData['section_id'] = $request->input('section_id');

        Partner::create($validatedData);

       return back()->with('success', 'تمت إضافة الشريك بنجاح');
    }

    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $partner = Partner::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move('public/images', $imageName);
            $data['image'] = $imageName;
        }

        $partner->update($data);

        return back()->with('success', 'تم تعديل الشريك بنجاح');
    }

    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->delete();

        return back()->with('success', 'تم حذف الشريك بنجاح');
    }


    
    public function sectionPartners($section_id)
{
    // Retrieve the section
    $section = Section::findOrFail($section_id);

    // Retrieve partners related to the section
    $partners = $section->partners;

    return view('admin.partners.index', compact('partners', 'section'));
}

}
