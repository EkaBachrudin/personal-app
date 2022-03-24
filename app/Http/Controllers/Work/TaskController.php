<?php

namespace App\Http\Controllers\Work;

use App\Http\Controllers\Controller;
use App\Models\Work\Task;
use App\Models\Work\TaskFrom;
use App\Models\Work\TaskHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    //deleting task from 
    private function deleteTaskFrom(){
      $taskFrom = TaskFrom::get();
      foreach($taskFrom as $data){
        if($data->task->count() == 0){
            $data->delete();
        }
      }
    }
    //end deleting task from 

    public function index(){
        $taskFroms = TaskFrom::latest()->get();
        return view('work.task.index', compact(
            'taskFroms',
        ));
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(),[
            'fromTask' => 'required',
            'title' => 'required',
            'task' => 'required',
        ]);
     
        if ($validator->validated()) {
            $taskFrom = TaskFrom::where('name', $request->fromTask)->first();

            if($taskFrom == null){
                $taskFrom = TaskFrom::create([
                    'name' => $request->fromTask,
                ]);
    
                $task = Task::create([
                    'task_from_id'  => $taskFrom->id,
                    'title'         => $request['title'],
                    'task'          => $request['task'],
                ]);
            }else{
                $task = Task::create([
                    'task_from_id'  => $taskFrom->id,
                    'title'         => $request['title'],
                    'task'          => $request['task'],
                ]);
            }

            return response()->json([
                'success'=>'Create task success!.',
                'taskFrom'=>$taskFrom,
                'task'=>$task,
            ]);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function getData($id){
        $task = Task::where('id', $id)->first();

        return response()->json([
            'task' =>  $task,
            'taskFrom' => $task->taskFrom,
        ]);
    }

    public function update($id, Request $request){
        $validator = Validator::make($request->all(),[
            'fromTask' => 'required',
            'title' => 'required',
            'task' => 'required',
        ]);
     
        if ($validator->validated()) {
            $taskFrom = TaskFrom::where('name', $request->fromTask)->first();
            if($taskFrom == null){
                $taskFrom = TaskFrom::create([
                    'name' => $request->fromTask,
                ]);
    
                $task = Task::where('id', $id)->update([
                    'task_from_id'  => $taskFrom->id,
                    'title'         => $request['title'],
                    'task'          => $request['task'],
                ]);
            }else{
                $task = Task::where('id', $id)->update([
                    'task_from_id'  => $taskFrom->id,
                    'title'         => $request['title'],
                    'task'          => $request['task'],
                ]);
            }
            $this->deleteTaskFrom();
            return response()->json([
                'success'=>'Task updated son of a bitch!.',
                'taskFrom'=>$taskFrom,
                'task'=>$task,
            ]);
        }
        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function completed($id){
        $task = Task::where('id', $id)->first();

        $history = TaskHistory::create([
            'from' => $task->taskFrom->name,
            'title' => $task->title,
            'task'  => $task->task,
        ]);

        $task->delete();
        $this->deleteTaskFrom();

        return response()->json([
            'success'=>'Task completed eka, you still the best on this class!.',
        ]);
    }

    public function delete($id){
        $task = Task::where('id', $id)->first();

        $task->delete();
        $this->deleteTaskFrom();

        return response()->json([
            'success'=>'Task has been deleted',
        ]);
    }

    // HISTORY Section

    public function taskHistory(Request $request){
        $search =  $request->search;
        if(!$search){
            $histories = TaskHistory::latest()->paginate('20');
        }
        else{
            $histories = TaskHistory::where(function ($query) use ($search){
                $query->where('title', 'like', '%'.$search.'%');
            })
            ->paginate(20);
        }
        return view('work.task.history', compact('histories'));
    }

    public function restoreHistory($id){
        $history = taskHistory::find($id);

        $taskFrom = TaskFrom::where('name', $history->from)->first();

            if($taskFrom == null){
                $taskFrom = TaskFrom::create([
                    'name' => $history->from,
                ]);
    
                $task = Task::create([
                    'task_from_id'  => $taskFrom->id,
                    'title'         => $history['title'],
                    'task'          => $history['task'],
                ]);
            }else{
                $task = Task::create([
                    'task_from_id'  => $taskFrom->id,
                    'title'         => $history['title'],
                    'task'          => $history['task'],
                ]);
            }

            $history->delete();

        return back()->with('success','Item restored successfully!');
    }
}
