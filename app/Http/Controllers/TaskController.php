<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class TaskController extends Controller
{
    public function index(TaskRequest $request)
    {
        $user = $request->user();
        $tasks = Task::query();
        $orderBy = $request->query('orderBy');
        $orderType = $request->query('orderType');
        $tasks->where('user_id', '=', $user->id);

        if ($request->input('title')) {
            $tasks->where('title', 'like', '%' . $request->input('title') . '%');
        }

        if ($orderBy) {
            $tasks->orderBy($orderBy, $orderType ?? 'asc');
        }

        return response()->json($tasks->paginate(8));
    }

    public function store(TaskRequest $request)
    {
        $task = new Task($request->validated());
        $task->user_id = Auth::id();
        $task->save();
        return response()->json(['message' => 'Task created sucessfully', 'task' => $task], 201);
    }

    public function update(TaskRequest $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->update($request->all());

        return response()->json(['message' => 'Task updated sucessfully', 'task' => $task], 200);
    }

    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Task deleted sucessfully'], 204);
    }
}
