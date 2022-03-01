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

    public function history(){
       $tasks = InstantTask::latest()->get()->groupBy(function($item)
       {
         return $item->created_at->format('d-M-y');
       });
    //    dd($tasks);
        return view('work.instant.history', compact(
            'tasks', 
        ));
    }
}
