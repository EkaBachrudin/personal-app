<?php

namespace App\Http\Controllers\Work;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoteWorkController extends Controller
{
    public function index(){
        return view('work.note.index');
    }
}
