<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function create()
    {
        return view('create');
    }

    public function edit($id)
    {
        return view('edit',['task' => Task::findOrFail($id)]);
    }

    public function index()
    {
        return view('index',['tasks' => Task::all()]);
    }

    public function closedIndex()
    {
        return view('trash_index',['tasks' => Task::onlyTrashed()->get()]);
    }


    public function show($id)
    {
        return view('show',['task' => Task::findOrFail($id)]);
    }

    public function showClosed($id)
    {
        return view('trash_show',['task' => Task::onlyTrashed()->findOrFail($id)]);
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

    public function close($id)
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
