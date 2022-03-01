<?php

namespace App\Models\Work;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstantTask extends Model
{
    use HasFactory;
    protected $table = 'instant_tasks';
    protected $guarded = [];
}
