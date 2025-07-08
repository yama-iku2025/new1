<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'skillsheet_id',
        'category',
        'name',
        'years',
        'level',
    ];

    public function skillsheet()
    {
        return $this->belongsTo(Skillsheet::class, 'skillsheet_id', 'id');
    }
}
