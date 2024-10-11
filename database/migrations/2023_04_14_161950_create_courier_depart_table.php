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
        Schema::create('courier_depart', function (Blueprint $table) {
            $table->bigInteger('numero');
            $table->unsignedBigInteger('code_ctt')->nullable();
            $table->date('date_env');
            $table->string('destinataire',50);
            $table->string('moyen',30);
            $table->string('reference')->unique();
            $table->float('frais')->nullable();
            $table->string('objet');
            $table->string('observation')->nullable();
            $table->foreign('code_ctt')
                  ->references('code')
                  ->on('contacts')
                  ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courier_depart');
    }
};
