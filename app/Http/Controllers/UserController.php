<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Task;

class UserController extends Controller
{
    public function adminDashboard()
    {
        return view('admin-dashboard',)->with([
            'users' => User::whereNotIn('id', [auth()->id()])->latest()->paginate(10),
            'tasks' => Task::latest()->get(),
            'taskCompleted' => Task::where('completed', 1)->get()->count(),
            'taskDeadline' => Task::where('completed', 0)->get()->count()
        ]);
    }

    public function UserDashboard()
    {
        return view('user_dashboard')->with([
            'tasks' => Task::where('working_id', auth()->id())->get()
        ]);
    }
}
