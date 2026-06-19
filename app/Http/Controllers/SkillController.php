<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'percentage' => 'nullable|integer|min:0|max:100',
            'category' => 'required|string|in:progress,stack',
            'icon' => 'nullable|string|max:255',
        ]);

        Skill::create($request->all());

        return redirect()->route('admin.index')->with('success', 'Keahlian berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'percentage' => 'nullable|integer|min:0|max:100',
            'category' => 'required|string|in:progress,stack',
            'icon' => 'nullable|string|max:255',
        ]);

        $skill = Skill::findOrFail($id);
        $skill->update($request->all());

        return redirect()->route('admin.index')->with('success', 'Keahlian berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        return redirect()->route('admin.index')->with('success', 'Keahlian berhasil dihapus!');
    }
}
