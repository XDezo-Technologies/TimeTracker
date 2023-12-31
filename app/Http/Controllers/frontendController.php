<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\project;
use App\Models\tasks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function ok()
    {
        return view('ok');
    }
    public function index()

    {
        $tasks = tasks::all();
        $projects = project::all();
        return view('frontend.dashboard', compact('tasks', 'projects'));
    }
    public function profilepage()
    {
        return view('frontend.profile');
    }
    public function showProject(Request $request)
    {

        $search = $request->input('search');

        $user_id = Auth::id();

        $projects = Project::where('user_id', $user_id)
            ->when($search, function ($query) use ($search) {
                $query->where('projectName', 'like', '%' . $search . '%');
            })
            ->paginate(3);
        return view('frontend.projects', compact('projects', 'search'));
    }



    public function showTask(Request $request)
    {
        $search = $request->input('search', '');

        $user_id = Auth::id();
        $task = tasks::with('projects')->find(1);


        /*  $tasks = tasks::with('project')->get();

        dd($tasks->project->projectName); */
        $tasks = Tasks::where('user_id', $user_id)
            ->when($search, function ($query) use ($search) {
                $query->where('taskname', 'like', '%' . $search . '%');
            })
            ->paginate(5);

        $savedTimestamp = Session::get('savedTimestamp');
        return view('frontend.tasks', compact('tasks', 'search', 'savedTimestamp'));
    }
}
