<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {

        if (Aaran\Aadmin\Src\DbMigration::hasErp()) {

            Schema::create('fabric_lots', function (Blueprint $table) {
                $table->id();
                $table->string('vname');
                $table->string('desc');
                $table->string('active_id', 3)->nullable();
                $table->foreignId('company_id')->references('id')->on('companies');
                $table->foreignId('user_id')->references('id')->on('users');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('fabric_lots');
    }
};
