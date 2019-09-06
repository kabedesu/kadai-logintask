<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
class TasksController extends Controller
{
    public function index()
    {
        if(\Auth::check()) {
            $data = [];
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at','desc')->paginate(10);
            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
        
            $data += $this->counts($user);
        }
        
        return view('welcome',$data);
    }
    
    public function create()
    {
        $task = new \App\Task;
        return view('tasks.create',[
            'task' => $task,
        ]);
    }
    
    public function store(Request $request)
    {
        //バリデーション
        $this->validate($request, [
            'title'=>'required|max:20',
            'content'=>'required|max:191',
            'status'=>'required|max:10',
        ]);
        $user = $request->user();   
        $user->tasks()->create([
            'user_id'=>$user->id,
            'title'=>$request->title,
            'content'=>$request->content,
            'status'=>$request->status
        ]);
        
        return redirect('/');
    }
    
    public function show($id)
    {
        $task = \Auth::user()->tasks()->find($id);
        return view('tasks.show',[
            'task'=>$task,  
        ]);
    }
    
    public function edit($id)
    {
        $task = \Auth::user()->tasks()->find($id);
        return view('tasks.edit',[
            'task'=>$task, 
        ]);
    }
        
    public function update(Request $request,$id) 
    {
        $task = \Auth::user()->tasks()->find($id);
    
        //バリデーション
        $this->validate($request, [
            'title'=>'required|max:20',
            'content'=>'required|max:191',
            'status'=>'required|max:10',
        ]);
        
        $task->title = $request->title;
        $task->content = $request->content;
        $task->status = $request->status;
        $task->save();
        
        return redirect('/');
    }
    
    public function destroy($id) 
    {
        $task = \Auth::user()->tasks()->find($id);
        if(\Auth::id() === $task->user_id) {
            $task->delete();
        }
        return redirect('/');
    }
}
