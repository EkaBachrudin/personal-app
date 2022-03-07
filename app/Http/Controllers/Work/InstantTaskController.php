<?php

namespace App\Http\Controllers\Work;

use App\Http\Controllers\Controller;
use App\Models\Work\InstantTask;
use Illuminate\Http\Request;

class InstantTaskController extends Controller
{
    public function index(){
        return view('work.instant.index');
    }

    public function create(Request $request){
        InstantTask::create([
            'task' => $request->task
        ]);
        return back();
    }

    //HISTORY=================================================
    public function history(){
       $tasks = InstantTask::latest()->get()->groupBy(function($item)
       {
         return $item->created_at->format('d-M-y');
       });

        return view('work.instant.history', compact(
            'tasks', 
        ));
    }

    public function getData($id){
        $task = InstantTask::find($id);
        return response()->json([
            'task'=> $task,
        ]);
    }

    public function deleteInstantHistory($id){
        $task = InstantTask::find($id);
        $task->delete();
        return response()->json([
            'success'=> 'success delete instant task',
        ]);
    }

    public function update($id, Request $request){
        $task = InstantTask::where('id', $id)->update([
            'task'  => $request['task'],
        ]);
        return response()->json([
            'task'=> $request['task'],
        ]);
    }
}
