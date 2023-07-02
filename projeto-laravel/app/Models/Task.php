<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model // define o modelo `Task` para representar a "tarefa" no aplicativo do Laravel e 
//define as configurações da tabela `tasks` associada.
{
    protected $table = 'tasks';

    protected $fillable = ['title', 'description', 'status']; 
    // São as colunas da tabela que podem ser preenchidas.

    protected $title;
    protected $description;
    protected $status;
  
}
