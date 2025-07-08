<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skillsheet;
use App\Models\Skill;
use App\Models\Project;

class SkillsheetController extends Controller
{
    public function index()
    {
        $sheets = Skillsheet::all();
        return view('skillsheets.index', compact('sheets'));
    }

    public function create()
    {
        return view('skillsheets.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'nullable|string|max:255',
            'address' =>'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'experience_years' => 'required|integer|min:0',
            'self_pr' => 'nullable|string',
            'skills' => 'array',
            'skills.*.category' => 'nullable|string|max:255',
            'skills.*.name' => 'nullable|string|max:255',
            'skills.*.years' => 'nullable|integer|min:0',
            'skills.*.level' => 'nullable|integer|min:1|max:5',
        ]);

        // スキルシートを保存
        $skillsheet = \App\Models\Skillsheet::create([
            'name' => $validated['name'],
            'age' => $validated['age'] ?? null,
            'address' => $validated['address'] ?? null,
            'email' => $validated['email'] ?? null,
            'experience_years' => $validated['experience_years'],
            'self_pr' => $validated['self_pr'] ?? null,
        ]);

        // スキルを保存（空行はスキップ）
        foreach ($validated['skills'] ?? [] as $skill) {
            if (!empty($skill['category']) || !empty($skill['name'])) {
                $skillsheet->skills()->create([
                    'category' => $skill['category'] ?? '',
                    'name' => $skill['name'] ?? '',
                    'years' => $skill['years'] ?? 0,
                    'level' => $skill['level'] ?? 1,
                ]);
            }
        }

        return redirect()->route('skillsheets.create')->with('success', 'スキルシートを登録しました。');
    }
}
