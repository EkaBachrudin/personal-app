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

    public function detail($id){
        $note = NoteWork::find($id);
        return view('work.note.detail', compact('note'));
    }

    public function getData($id){
        $note = NoteWork::find($id);
        return response()->json([
            'note' => $note,
        ]);
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $note = NoteWork::find($id)->update([
            'title' => $validated['title'],
            'body'  => $validated['body'],
        ]);

        return back();
    }
}
