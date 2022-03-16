<?php

namespace App\Http\Controllers\Work;

use App\Http\Controllers\Controller;
use App\Models\Work\NoteWork;
use Illuminate\Http\Request;

class NoteWorkController extends Controller
{
    public function index(){
        $notes = NoteWork::latest()->get();
        return view('work.note.index', compact('notes'));
    }
    
    public function create(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        NoteWork::create([
            'title' => $validated['title'],
            'body'  => $validated['body'],
        ]);

        return back();
    }
}
