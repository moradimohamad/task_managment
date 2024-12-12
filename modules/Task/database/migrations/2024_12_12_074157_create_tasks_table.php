<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->comment("user who created task");
            $table->string('title',128);
            $table->unsignedInteger('priority');
            $table->text('description');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete(null)->onUpdate("CASCADE");
        });
//
//        Schema::create('task_user', function (Blueprint $table) {
//            $table->id();
//            $table->foreignId('user_id');
//            $table->foreignId('task_id');
//
//        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('task_user');
    }
};
