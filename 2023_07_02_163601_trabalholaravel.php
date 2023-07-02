<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //criar a estrutura da tabela `tasks` no banco de dados.
    /**
     * Run the migrations.
     */
    public function up(): void //define os campos a seguir, 
    //o que permite o armazenamento e rastreamento de tarefas.
    {
        Schema::create('tasks', function (Blueprint $table) { 
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->enum('status', ['concluída', 'não concluída']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void //reverte as operações de migração, 
    //exclui a tabela "tasks".  
    {
        Schema::dropIfExists('tasks');
    }
};
