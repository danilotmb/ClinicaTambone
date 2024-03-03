<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Chiave esterna verso la tabella degli utenti
            $table->foreignId('doctor_id')->constrained(); // Chiave esterna verso la tabella dei dottori (se presente)
            $table->text('report')->nullable(); // Referto della visita
            $table->string('qrcode')->nullable(); // Eventuale campo per il QRCode
            $table->dateTime('date'); // Data della visita
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
