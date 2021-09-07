<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index() {
        return Task::all();
    }

    public function show(Task $task) {
        return $task;
    }

    public function store(Request $reqest) {
        return Task::create($reqest->all());
    }

    public function update(Request $reqest, Task $task) {
        $task->update($request->all());
        return $task;
    }

    public function destroy(Task $task) {
        $task->delete();
        return $task;
    }
}
