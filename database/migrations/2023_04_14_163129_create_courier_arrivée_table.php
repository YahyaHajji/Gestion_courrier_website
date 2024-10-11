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
        Schema::create('courier_arrivée', function (Blueprint $table) {
            $table->bigInteger('numero');
            $table->unsignedBigInteger('code_ctt')->nullable();
            $table->date('date_arv');
            $table->string('expéditeur',50);
            $table->string('moyen',30);
            $table->date('date_exp');
            $table->string('reference')->unique();
            $table->string('objet');
            $table->string('observation')->nullable();
            $table->timestamps();
            $table->foreign('code_ctt')
                  ->references('code')
                  ->on('contacts')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courier_arrivée');
    }
};
