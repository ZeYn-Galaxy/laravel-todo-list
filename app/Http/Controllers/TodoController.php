<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    //
    function index()
    {
        $data = Todo::all();
        return view("home/index", ["Data" => $data->toArray()]);
    }

    function create(Request $request)
    {
        // $validate = $request->validate([
        //     "task" => "required||unique:todo"
        // ], ["task.required" => "task harus diis!", "task.unique" => "task sudah ada!"]);

        $validate = Validator::make($request->all(), [
            "task" => "required"
        ], ["task.required" => "task tidak boleh kosong!"]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $validate = $validate->validated();
        // Lanjutkan untuk memasukkan data
        try {
            $task = new Todo;
            $task->id = uniqid();
            $task->task = $request->input("task");
            $task->save();
            return redirect()->back();
        } catch (QueryException $e) {
            if ($e->errorInfo[1] === 1062) {
                return redirect()->back()->withErrors("ID sudah ada!");
            }
        }
    }

    function delete(Request $request) {
        $model = new Todo;
        $model->deleteRow($request->input("id"));
        return redirect()->back();
    }

    function update(Request $request) {
        $model = new Todo;
        $model->updateRow($request);
        return redirect()->back();
    }
}
