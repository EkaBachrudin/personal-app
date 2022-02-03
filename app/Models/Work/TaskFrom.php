<?php

namespace App\Models\Work;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskFrom extends Model
{
    use HasFactory;
    protected $table = 'task_froms';
    protected $guarded = [];

    public function task()
    {
        return $this->hasMany(Task::class);
    }
}
