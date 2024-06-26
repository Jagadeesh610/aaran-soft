<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasAudit()) {

            Schema::create('rootline_items', function (Blueprint $table) {
                $table->id();
                $table->integer('serial')->nullable();
                $table->foreignId('rootline_id')->references('id')->on('rootlines');
                $table->foreignId('client_id')->references('id')->on('clients');
                $table->smallInteger('active_id')->nullable();
                $table->foreignId('user_id')->references('id')->on('users');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('track_items');
    }
};
