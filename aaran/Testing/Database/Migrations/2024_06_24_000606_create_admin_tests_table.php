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
        Schema::create('admin_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')->references('id')->on('test_modules')->onDelete('cascade');
            $table->string('migration');
            $table->boolean('checked_1');
            $table->boolean('checked_2');
            $table->boolean('checked_3');
            $table->longText('description');
            $table->longText('comment');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->smallInteger('active_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_tests');
    }
};
