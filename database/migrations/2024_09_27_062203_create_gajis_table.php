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
        Schema::create('gajis', function (Blueprint $table) {
            $table->id();
            $table->string("email");
            $table->integer("nomor");
            $table->string("nama");
            $table->string("jabatan");
            $table->integer("gaji_pokok");
            $table->integer("penyesuaian");
            $table->integer("penyesuaian_pendidikan");
            $table->integer("gaji_pokok2");
            $table->integer("tunjangan_jabatan");
            $table->integer("tunjangan_kepangkatan");
            $table->integer("tunjangan_transport");
            $table->integer("kelebihan_jam");
            $table->integer("rapelan");
            $table->integer("gaji_bruto");
            $table->integer("dplk");
            $table->integer("potongan_bpjs_kes");
            $table->integer("potongan_bpjs_jht");
            $table->integer("potongan_bpjs_pensiun");
            $table->integer("piutang_karyawan");
            $table->integer("piutang_karyawan_koperasi");
            $table->integer("simpanan_pokok");
            $table->integer("potongan_pajak");
            $table->integer("potongan_arisan");
            $table->integer("take_home_pay");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gajis');
    }
};
