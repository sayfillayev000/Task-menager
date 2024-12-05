<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(): View
    {
        return view('task.index',)->with('tasks', Task::latest()->paginate(10));
    }

    public function create(): View
    {
        return view('task.create')->with('users', User::whereNotIn('id', [auth()->id()])->get());
    }

    public function store(TaskRequest $request): RedirectResponse
    {
        Task::create([
            'writer_id' => auth()->id(),
            'working_id' => $request->working_id,
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'completed' => false,
        ]);

        return redirect()->route('task.index')->with('success', 'Topshiriq muvifaqqiyatli yaratildi');
    }

    public function show(Task $task): View
    {
        return view('task.show')->with('task', $task);
    }

    public function edit(Task $task): View
    {
        return view('task.edit')->with(['task' => $task, 'users' => User::whereNotIn('id', [auth()->id()])->get()]);
    }

    public function update(Request $request, Task $task): RedirectResponse
    {
        $task->update($request->all());

        return redirect()->route('task.index')->with('success', "Topshiriq muvifaqqiyatli o'zgartirildi");
    }

    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();
        return redirect()->route('task.index')->with('success', 'Topshiriq o\'chirildi');
    }



    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $originalName = $request->file('file')->getClientOriginalName();

        $filePath = basename($request->file('file')->storeAs('public', $originalName));

        Task::find($request->task_id)->update([
            'file' => $filePath
        ]);

        return back()->with('success', 'file muvofaqqiyatli yuklandi')->with('filePath', $filePath);
    }

    public function downloadFile($file)
    {
        $filePath = 'public/' . $file;

        if (Storage::exists($filePath)) {
            return Storage::download($filePath);
        }

        return back()->with('error', 'File not found.');
    }
}
