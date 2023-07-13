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
        Schema::create('batiments', function (Blueprint $table) {
        $table->id();
        $table->string('nom');
        $table->string('adresse', 150);
        $table->unsignedBigInteger('id_proprietaire');
        $table->string('entree_principale');
        $table->string('entree_secondaire')->nullable();
        $table->integer('nbApptDispo');
        $table->timestamps();
    $table->foreign('id_proprietaire')->references('id')->on('proprietaires');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batiments');
    }
};
