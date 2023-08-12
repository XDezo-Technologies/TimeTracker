<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{

    protected $fillable = [
        'title', 'description', 'is_completed', 'started_at', 'completed_at', 'project_id'
    ];
    
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function projects()
    {
        return $this->belongsTo(project::class, 'project_id');
    }
}
