<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('writer_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('working_id')->constrained('users')->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->dateTime('deadline');
            $table->boolean('completed')->default(false);
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
