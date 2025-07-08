<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skillsheet extends Model
{
    use HasFactory;

    protected $table = 'skill_sheets';
    protected $fillable = [
        'name',
        'age',
        'address',
        'email',
        'experience_years',
        'self_pr',
    ];

     // スキル（skills）とのリレーション
    public function skills()
    {
        return $this->hasMany(Skill::class, 'skillsheet_id', 'id');
    }

    // プロジェクト（projects）とのリレーション
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
