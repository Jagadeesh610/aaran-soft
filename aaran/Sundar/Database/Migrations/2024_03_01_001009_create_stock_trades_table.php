<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasShareMarket()) {

            Schema::create('stock_trades', function (Blueprint $table) {
                $table->id();
                $table->integer('serial')->nullable();
                $table->string('vdate')->nullable();
                $table->foreignId('stock_name_id')->references('id')->on('stock_names')->cascadeOnDelete();
                $table->string('trade_type')->nullable();
                $table->decimal('buy', 15, 2)->nullable();
                $table->decimal('sell', 15, 2)->nullable();
                $table->decimal('spread', 15, 2)->nullable();
                $table->decimal('shares', 15, 2)->nullable();
                $table->decimal('profit', 15, 2)->nullable();
                $table->decimal('loosed', 15, 2)->nullable();
                $table->decimal('commission', 15, 2)->nullable();
                $table->foreignId('share_trade_id')->references('id')->on('share_trades')->cascadeOnDelete();
                $table->decimal('active_id', 3)->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('stock_trades');
    }
};
