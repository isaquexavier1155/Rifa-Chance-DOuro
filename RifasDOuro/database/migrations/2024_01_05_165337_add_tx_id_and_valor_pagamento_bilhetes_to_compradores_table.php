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
        Schema::table('compradores', function (Blueprint $table) {
            $table->string('tx_id')->nullable();
            $table->decimal('valor_pagamento_bilhetes', 8, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('compradores', function (Blueprint $table) {
            $table->dropColumn('tx_id');
            $table->dropColumn('valor_pagamento_bilhetes');
        });
    }
};
