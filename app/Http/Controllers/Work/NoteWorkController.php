<?php

namespace App\Http\Controllers\Work;

use App\Http\Controllers\Controller;
use App\Models\Work\NoteWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoteWorkController extends Controller
{
    public function index(Request $request){

        $search =  $request->search;
        if(!$search){
            $notes = NoteWork::latest("updated_at")->paginate(50);
        }
        else{
            $notes = NoteWork::where(function ($query) use ($search){
                $query->where('title', 'like', '%'.$search.'%');
            })
            ->paginate(50);
        }


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
        $validator = Validator::make($request->all(), [
                'title' => 'required',
                'body' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        NoteWork::find($id)->update([
            'title' => $request['title'],
            'body'  => $request['body'],
        ]);

        $note = collect([
            'title' => $request['title'],
            'body'  => $request['body'],
        ]);
        
        return response()->json([
            'note' => $note,
        ]);
    }
}
