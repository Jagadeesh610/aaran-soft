<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasCreditBooks()) {

            Schema::create('credit_interests', function (Blueprint $table) {
                $table->id();
                $table->foreignId('credit_book_item_id')->references('id')->on('credit_book_items');
                $table->date('vdate');
                $table->decimal('interest', 11, 2);
                $table->decimal('received', 11, 2);
                $table->string('received_date')->nullable();
                $table->string('remarks');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('credit_interests');
    }
};
