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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id('code');
            $table->string('raison_social',50);
            $table->string('organisme');
            $table->string('type');
            $table->string('activite');
            $table->string('adresse')->unique();
            $table->string('ville');
            $table->string('email')->unique();
            $table->string('tel',20)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
