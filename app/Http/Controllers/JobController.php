<?php

namespace App\Http\Controllers;

use App\Livewire\Jobs;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{

    public function index()
    {
        $jobs = Job::with('employer')->latest()->Paginate(4);
         // $jobs = Job::with('employer')->get();//Eager loading employer relationship

        return view('jobs.index', [
        'jobs' => $jobs
    ]);
    }
    public function loadMore(Request $request)
    {
        $page = $request->page ?? 1;

        $jobs = Job::with('employer')
            ->latest()
            ->paginate(3, ['*'], 'page', $page);

        return view('jobs.partials.job-cards', compact('jobs'))->render();
    }

    public function filter(Request $request)
    {
        $query = Job::with('employer')->latest();

        if($request->title) {
            $query->where('title', 'like', '%'.$request->title.'%');
        }

        if($request->salary) {
            $query->where('salary', $request->salary);
        }

        if($request->status) {
            $query->where('status', $request->status);
        }

        $jobs = $query->paginate(3);

        return view('jobs.partials.job-cards', compact('jobs'))->render();
    }


    public function create()
    {
        return view('jobs.create');
    }
    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }
    public function store()
    {
            request()->validate([
            'title' =>['required', 'min:3'],
            'salary' => ['required'],
            'status' => ['required']
        ]);

        //creating the job in database
        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'status' => request('status'),
            'employer_id' => 1 // Temporary static employer ID
        ]);

        //to enable viewing of the new created job
        
        return redirect('/jobs'); 
    }
    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }
    public function update(Job $job)
    {
            //validate
        request()->validate([
            'title' =>['required', 'min:3'],
            'salary' => ['required'],
            'status' => ['required']
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
            'status' => request('status'),

        ]);

        return redirect('/jobs/' . $job->id);
    }
    public function destroy(Job $job)
    {
        $job->delete();

        return redirect('/jobs');
    }
}
