<?php
namespace App\Http\Controllers\admin;
use App\Models\Business;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;

class BusinessesController extends Controller
{
   
    public function index()
    {
        $businesses = Business::all();
        return view('admin.businesses.index', compact('businesses'));
    }

    public function create($section_id)
    {
        $section = Section::find($section_id);
        return view('admin.businesses.create', compact('section'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $validatedData['section_id'] = $request->input('section_id');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName(); // الحصول على اسم الملف الأصلي
            $image->move('public/images', $imageName);     // نقل الملف المرفوع إلى مجلد
            $validatedData['image'] = $imageName;          // حفظ اسم الصورة الكامل في بيانات الموثقة
        }

        Business::create($validatedData);

       return back()->with('success', 'تمت إضافة العمل بنجاح');
    }

    public function edit($id)
    {
        $business = Business::findOrFail($id);
        return view('admin.businesses.edit', compact('business'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $business = Business::findOrFail($id);
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move('public/images', $imageName);
            $data['image'] = $imageName;
        }

        $business->update($data);

       return back()->with('success', 'تم تحديث العمل بنجاح');
    }

    public function destroy($id)
    {
        $business = Business::findOrFail($id);
        $business->delete();

        return back()->with('success', 'تم حذف العمل بنجاح');
    }
    
    public function sectionBusinesses($section_id)
    {
        $section = Section::findOrFail($section_id);
        $businesses = $section->businesses;

        return view('admin.businesses.index', compact('businesses', 'section'));
    }

}
