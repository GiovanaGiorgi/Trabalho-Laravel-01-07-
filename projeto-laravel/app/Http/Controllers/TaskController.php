<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Task;
class TaskController extends Controller
{
    public function index(){ //retorna uma lista com todas as tarefas existentes.
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function show($id){ //retorna os detalhes de uma tarefa específicada pelo seu ID.
        $tasks = Task::findOrFail($id);
        return response()->json($tasks);
    }

    public function store(Request $request){ 
        //cria uma tarefa baseado nos dados fornecidos em "$request".
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|in:concluída,não concluída',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $task = Task::create($request->all());
        return response()->json($task, 201); 
    }

    public function update(Request $request, $id){
        //atualiza os dados de uma tarefa existente, especificada com ID.
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|in:concluída,não concluída',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|in:concluída,não concluída',
        ]);

        $task = Task::findOrFail($id);
        $task->update($request->all());
        return response()->json($task);
    }

    public function destroy($id){ //exclui uma tarefa existente, especificada com ID.
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(null, 204); 
    }
}
