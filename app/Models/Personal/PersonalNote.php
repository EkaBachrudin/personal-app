<?php

namespace App\Models\Personal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalNote extends Model
{
    use HasFactory;

    protected $table = 'personal_notes';
    protected $guarded = [];
}
