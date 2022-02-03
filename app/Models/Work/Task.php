<?php

namespace App\Models\Work;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
    protected $table = 'tasks';
    protected $guarded = [];

    public function taskFrom()
    {
        return $this->belongsTo(TaskFrom::class);
    }
}
