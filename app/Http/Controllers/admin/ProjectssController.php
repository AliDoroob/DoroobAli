<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Section;

class ProjectssController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function create($section_id)
    {
        $section = Section::find($section_id);
        return view('admin.projects.create', compact('section'));
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|string', // Add validation for the content field    
            'project_link' => 'required|url', // You can add validation rules here
        ]);

        $validatedData['section_id'] = $request->input('section_id');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName(); // Get the original file name
            $image->move('public/images', $imageName);     // Move the uploaded file to a directory
            $validatedData['image'] = $imageName;          // Save the complete image name in validated data
        }

       
      $project=  Project::create($validatedData);
      $project->content = $request->input('content');
      $project->project_link = $request->input('project_link');
      $project->save();
       return back()->with('success', 'تمت إضافة المشروع بنجاح');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|string',   
            'project_link' => 'required|url', 
        ]);

        $project = Project::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('public/images', $imageName);
            $data['image'] = 'images/' . $imageName;
        }
          $project->content = $request->input('content');
          $project->save();

          $project->project_link = $request->input('project_link');
           $project->save();

        $project->update($data);

        return back()->with('success', 'تم تعديل المشروع بنجاح');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

          return back()->with('success', 'تم حذف المشروع بنجاح');
    }
    public function sectionProjects($section_id)
    {
        $section = Section::findOrFail($section_id);
        $projects = $section->projects;
    
        return view('admin.projects.index', compact('projects', 'section'));
    }
    
}
