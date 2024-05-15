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
       // Schema::disableForeignKeyConstraints();

        Schema::create('tbl_sertifikat', function (Blueprint $table) {
            $table->id('sertifikat_id');
            $table->integer('user_id');
           // $table->foreign('user_id')->references('id')->on('users');
            $table->integer('peserta_id');
           // $table->foreign('peserta_id')->references('peserta_id')->on('tbl_peserta');
            $table->integer('event_id');
            //$table->foreign('event_id')->references('event_id')->on('tbl_event');
            $table->text('number');
            $table->date('sertifikat_date');
            $table->timestamp('sertifikat_time');
        });

       // Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_sertifikat');
    }
};
