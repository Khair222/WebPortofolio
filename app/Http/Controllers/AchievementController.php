<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'issuer' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('achievements', 'public');
        }

        \App\Models\Achievement::create($data);
        return redirect()->route('admin.index')->with('success', 'Prestasi berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required', 
            'issuer' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        $achievement = \App\Models\Achievement::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($achievement->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($achievement->image)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($achievement->image);
            }
            $data['image'] = $request->file('image')->store('achievements', 'public');
        }

        $achievement->update($data);
        return redirect()->route('admin.index')->with('success', 'Prestasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $achievement = \App\Models\Achievement::findOrFail($id);
        $achievement->delete();
        return redirect()->route('admin.index')->with('success', 'Prestasi berhasil dihapus!');
    }
}
