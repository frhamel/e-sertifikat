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
        //Schema::disableForeignKeyConstraints();

        Schema::create('tbl_peserta', function (Blueprint $table) {
            $table->id('peserta_id');
            $table->integer('user_id');
           // $table->foreign('user_id')->references('id')->on('users');
            $table->integer('event_id');
            $table->string('peserta_name')->nullable();
            $table->string('nis');
            $table->string('class');
            $table->string('school');
            $table->integer('status'); // 1= lulus, 2=tdk lulus.
        });

        //Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_peserta');
    }
};
