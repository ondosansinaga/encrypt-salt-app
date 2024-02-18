<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('perizinan', function (Blueprint $table) {
            $table->bigIncrements('id_perizinan');
            $table->unsignedBigInteger('id_karyawan');
            $table->unsignedBigInteger('id_admin');
            $table->string('perihal');
            $table->string('bukti');
            $table->timestamps();

            $table->foreign('id_admin')->references('id_admin')->on('admin');
            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perizinans');
    }
};