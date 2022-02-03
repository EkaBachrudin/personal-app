<?php

namespace App\Http\Controllers\Work;

use App\Http\Controllers\Controller;
use App\Models\Work\Task;
use App\Models\Work\TaskFrom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index(){
        return view('work.task.index');
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(),[
            'fromTask' => 'required',
            'title' => 'required',
            'task' => 'required',
        ]);
     
        if ($validator->validated()) {
            $taskFrom = TaskFrom::create([
                'name' => $request->fromTask,
            ]);

            $task = Task::create([
                'task_from_id'  => $taskFrom->id,
                'title'         => $request['title'],
                'body'          => $request['task'],
            ]);

            return response()->json([
                'success'=>'Create task success!.',
                'taskFrom'=>$taskFrom,
                'task'=>$task,
            ]);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }
}
