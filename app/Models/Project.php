<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'skillsheet_id',
        'name',
        'start_date',
        'end_date',
        'role',
        'tech_stack',
    ];

    public function skillsheet()
    {
        return $this->belongsTo(Skillsheet::class);
    }
}
