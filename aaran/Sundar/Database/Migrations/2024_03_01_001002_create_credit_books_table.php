<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasCreditBooks()) {

            Schema::create('credit_books', function (Blueprint $table) {
                $table->id();
                $table->foreignId('credit_member_id')->references('id')->on('credit_members');
                $table->string('vname')->unique();
                $table->decimal('loan', 15, 2);
                $table->decimal('emi', 15, 2);
                $table->decimal('closing', 15, 2);
                $table->string('active_id', 3)->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('credit_books');
    }
};
