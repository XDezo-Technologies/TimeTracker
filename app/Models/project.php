<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;


    protected $fillable = [
        'projectName',
        'dueDate',
        'descriptions',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    protected $casts = [

        'status' => 'boolean',
    ];
    public function tasks()
    {
        return $this->hasMany(tasks::class);
    }

    /*   public function tasks()
    {
        return $this->hasMany(Task::class);
    } */
}
