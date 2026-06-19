<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('completed')
                    ->orderByDesc('created_at')
                    ->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'image'=>'nullable|image'
        ]);

        $image = null;

        if($request->hasFile('image')){
            $image = $request->file('image')->store('tasks','public');
        }

        Task::create([
            'title'=>$request->title,
            'image'=>$image
        ]);

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title'=>'required',
            'image'=>'nullable|image'
        ]);

        if($request->hasFile('image')){

            if($task->image){
                Storage::disk('public')->delete($task->image);
            }

            $task->image = $request->file('image')->store('tasks','public');
        }

        $task->title = $request->title;
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        if($task->image){
            Storage::disk('public')->delete($task->image);
        }

        $task->delete();

        return redirect()->route('tasks.index');
    }

    public function toggle(Task $task)
    {
        $task->completed = !$task->completed;
        $task->save();

        return redirect()->back();
    }

    public function removeImage(Task $task)
    {
        if($task->image){
            Storage::disk('public')->delete($task->image);
            $task->image = null;
            $task->save();
        }

        return back();
    }
}