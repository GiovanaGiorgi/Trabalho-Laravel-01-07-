<?php
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::resource('tasks', TaskController::class);
 //Determina que a rota '/tasks' vai ser associada ao TaskController
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user(); //Essa rota retorna as informações do User 
});
