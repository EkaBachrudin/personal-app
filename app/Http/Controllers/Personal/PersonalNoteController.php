<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Personal\PersonalNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonalNoteController extends Controller
{
    public function index(Request $request){

        $search =  $request->search;
        if(!$search){
            $notes = PersonalNote::latest("updated_at")->paginate(50);
        }
        else{
            $notes = PersonalNote::where(function ($query) use ($search){
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

        PersonalNote::create([
            'title' => $validated['title'],
            'body'  => $validated['body'],
        ]);

        return back();
    }

    public function detail($id){
        $note = PersonalNote::find($id);
        return view('work.note.detail', compact('note'));
    }

    public function getData($id){
        $note = PersonalNote::find($id);
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

        PersonalNote::find($id)->update([
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
