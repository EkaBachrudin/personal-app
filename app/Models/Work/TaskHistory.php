<?php

namespace App\Models\Work;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskHistory extends Model
{
    use HasFactory;

    protected $table = 'task_histories';
    protected $guarded = [];
}
