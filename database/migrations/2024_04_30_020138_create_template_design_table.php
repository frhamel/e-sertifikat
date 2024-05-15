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

        Schema::create('template_design', function (Blueprint $table) {
            $table->id();
            $table->string('nama_template');
            $table->string('gambar_template');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

       // Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('template_design');
    }
};
