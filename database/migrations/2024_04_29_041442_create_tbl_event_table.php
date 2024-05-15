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

        Schema::create('tbl_event', function (Blueprint $table) {
            $table->id('event_id');
            $table->integer('user_id');
            //$table->foreign('user_id')->references('id')->on('users');
            $table->integer('template_id');
            $table->string('title');
            $table->date('event_date');
            $table->string('name_ttd');
            $table->string('ttd');
            //$table->enum('status', [""]);  
        });

       // Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_event');
    }
};
