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
        Schema::create('campagnes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->dateTime('dateDebut')->default('2023-08-08');
            $table->dateTime('dateFin')->nullable();
            $table->boolean('enCours')->default(true);
            $table->dateTime('dateDebFond')->nullable()->default('2023-08-10');
            $table->string('fichierCommande',100)->nullable();
            $table->dateTime('dateRemiseFond')->default('2023-09-09');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campagnes');
    }
};
