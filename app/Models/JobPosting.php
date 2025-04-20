<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobPosting extends Model
{
    /** @use HasFactory<\Database\Factories\JobPostingFactory> */
    use HasFactory;
    use SoftDeletes;
    
    protected $guarded = [];
    
    protected $casts = [
        'extra' => 'array',
    ];
    
    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
}
