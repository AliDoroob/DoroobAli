<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Statistic;
use App\Models\Section;

class StatisticsController extends Controller
{
    public function index()
    {
        $statistics = Statistic::all(); // Assuming you have a Statistic model and table
        return view('admin.statistics.index', compact('statistics'));
    }
    

    public function create($section_id)
{
    $section = Section::find($section_id);
    return view('admin.statistics.create', compact('section'));
}

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'number' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $statistic = new Statistic();
        $statistic->name = $validatedData['name'];
        $statistic->number = $validatedData['number'];
        $statistic->section_id = $request->input('section_id'); // Assign section_id here
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move('public/images', $imageName);
            $statistic->image = $imageName;
        }
    
        $statistic->save();
    
        return back()->with('success', 'تمت اضافة الالاحصائية بنجاح');
    }
    


    public function edit($id)
    {
        $statistic = Statistic::findOrFail($id);
        return view('admin.statistics.edit', compact('statistic'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'number' => 'required|numeric',
        ]);

        $statistic = Statistic::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move('public/images', $imageName);
            $data['image'] = $imageName;
        }

        $statistic->update($data);

        return back()->with('success', 'تم تعديل الإحصائية بنجاح');
    }

    public function destroy($id)
    {
        $statistic = Statistic::findOrFail($id);
        $statistic->delete();

       return back()->with('success', 'تم حذف الإحصائية بنجاح');
    }
    public function sectionStatistics($section_id)
{
    // Retrieve the section
    $section = Section::findOrFail($section_id);

    // Retrieve statistics related to the section
    $statistics = $section->statistics;

    return view('admin.statistics.index', compact('statistics', 'section'));
}

}
