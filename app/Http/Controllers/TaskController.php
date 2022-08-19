<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function create()
    {
        return view('task_create');
    }

    public function edit($id)
    {
        return view('task_edit',['task' => Task::findOrFail($id)]);
    }

    public function completed()
    {
        return view('task_index',['tasks' => Task::where('is_complete',1)]);
    }

    public function search($name)
    {
        return view('task_index',['tasks' => Task::where('name', 'LIKE', "%{$name}%")->get()]);
    }

    public function index()
    {
        return view('task_index',['tasks' => Task::all()]);
    }

    public function deleteIndex()
    {
        return view('trash_task_index',['tasks' => Task::onlyTrashed()->get()]);
    }


    public function show($id)
    {
        return view('task_show',['task' => Task::findOrFail($id)]);
    }

    public function showDelete($id)
    {
        return view('trash_task_show',['task' => Task::onlyTrashed()->findOrFail($id)]);
    }


    public function store(Request $request)
    {
        if ($this->validation($request)) {
            Task::create($request->all());
        }
        return back();
    }


    public function update(Request $request, $id)
    {
        if ($this->validation($request)) {
            Task::where('id', $id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'priority' => $request->priority,
            ]);
        }
        return back();
    }

    public function delete($id)
    {
        Task::where('id',$id)->delete();
        return back();
    }

    public function restore($id)
    {
        Task::onlyTrashed()->where('id',$id)->restore();
        return redirect('/trash/index');
    }

    public function destroy($id)
    {
        Task::onlyTrashed()->where('id',$id)->forceDelete();
        return back();
    }

    public function validation(Request $request)
    {
        return $request->validate([
            'name' => 'required',
            'description' => 'required',
            'priority' => 'required',
        ]);
    }
}
