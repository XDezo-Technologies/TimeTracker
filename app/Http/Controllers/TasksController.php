<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\tasks;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = tasks::all();
        $projects = project::all();
        return view('frontend.tasks', compact('tasks' , 'projects'));
    }
  
    public function create()
    {
        return view('tasks.create');
    }


    public function store(Request $request)
    {
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'project_id' => 'required',
        
    ]);

    $projects = project::find($request->project_id);
    $title = $projects->projectName;
    $tasks = new tasks();
    $tasks->description = $request->description;
    $tasks->project_id = $request->project_id;
    $tasks->title = $title;
    $tasks->save();
    return redirect()->route('tasks.index')->with('message', 'Task created successfully.');
}


    public function show(tasks $task)
    {
      
        return view('tasks.show', compact('task'));
    }

    public function edit($id)
    {
        $projects = project::all();
        $task = tasks::all();
        $task = $task->where('id', $id)->first();
        return view('frontend.edittasks', compact('task', 'projects'));
    }

    public function update(Request $request, $id)
    {
        $task = new tasks;
        $task = $task->where('id', $id)->First();
        $task->description = $request->description;
        $task->project_id = $request->project_id;
        $task->update();

        return redirect()->route('tasks.index')->with('message', 'Task updated successfully.');
    }

    public function destroy($id)
    {
        $task = new tasks;
        $task = $task->where('id', $id)->first();
  
        $task->delete();

        return redirect()->route('tasks.index')->with('message', 'Task deleted successfully.');
    }

    public function startTimer(Request $request, tasks $task)
    {
        $task->update([
            'started_at' => now(),
        ]);

        return redirect()->back()->with('message', 'Timer started.');
    }

    public function stopTimer(Request $request, tasks $task)
    {
        $task->update([
            'completed_at' => now(),
            'is_completed' => true,
        ]);

        return redirect()->back()->with('message', 'Timer stopped.');
    }
}
