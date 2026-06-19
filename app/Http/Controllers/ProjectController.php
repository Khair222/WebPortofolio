<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = \App\Models\Project::latest()->get();
        $achievements = \App\Models\Achievement::latest()->get();
        $galleries = \App\Models\Gallery::latest()->get();
        $skills = \App\Models\Skill::all();
        // Calculate basic stats for the dashboard
        $totalViews = 1245; // Placeholder
        $newMessages = 24; // Placeholder
        $activeProjects = \App\Models\Project::where('status', 'Aktif')->count();
        
        return view('admin.index', compact('projects', 'achievements', 'galleries', 'skills', 'totalViews', 'newMessages', 'activeProjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        \App\Models\Project::create($data);
        return redirect()->route('admin.index')->with('success', 'Proyek berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $project = \App\Models\Project::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            // Delete old image if needed, but for simplicity we just store the new one
            if ($project->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($project->image)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($project->image);
            }
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($data);
        
        return redirect()->route('admin.index')->with('success', 'Proyek berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $project = \App\Models\Project::findOrFail($id);
        $project->delete();
        
        return redirect()->route('admin.index')->with('success', 'Proyek berhasil dihapus!');
    }
}
