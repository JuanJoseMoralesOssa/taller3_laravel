<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id('todo_id')->firts()->autoIncrement()->unique();
            $table->string('todo_title');
            $table->text('todo_description')->nullable();
            $table->boolean('status')->default(false);
            $table->string('state')->default('earring');
            $table->dateTimeTz('todo_created_at');
            $table->dateTimeTz('due_date')->nullable();
            $table->dateTimeTz('todo_updated_at')->nullable();
            $table->dateTimeTz('completed_at')->nullable();
            $table->string('assigned_to')->nullable();
            $table->integer('priority')->default(0);
            $table->float('progress_percent')->default(0);
            $table->integer('subtasks_num')->nullable()->comment('The number of subtasks that the todo has');
            $table->json('tags')->nullable()->default(new Expression('(JSON_ARRAY())'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
