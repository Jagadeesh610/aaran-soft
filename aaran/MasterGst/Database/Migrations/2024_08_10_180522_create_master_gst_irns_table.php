<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        if (Aaran\Aadmin\Src\DbMigration::hasGstApi()) {
            Schema::create('master_gst_irns', function (Blueprint $table) {
                $table->id();
                $table->longText('ackno');
                $table->longText('ackdt');
                $table->longText('irn');
                $table->longText('signed_invoice');
                $table->longText('signed_qrcode');
                $table->timestamps();
            });
        }
    }


    public function down(): void
    {
        Schema::dropIfExists('master_gst_irns');
    }
};