<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_persyaratans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->string('nama_perusahaan');
            $table->string('akta_pendirian');
            $table->string('nib_siup');
            $table->string('npwp_perusahaan');
            $table->string('nomor_pkp');
            $table->string('spt_tahunan');
            $table->string('domisili_perusahaan');
            $table->string('nama_direktur');
            $table->string('ktp_direktur');
            $table->string('surat_penawaran_kerjasama');
            $table->string('surat_kuasa_dari_pimpinan_perusahaan');
            $table->string('nama_media');
            $table->string('jenis_media');
            $table->string('klasifikasi_media');
            $table->string('domisili_media');
            $table->string('sertifikat_dewan_pers');
            $table->string('organisasi_kewartawanan');
            $table->string('surat_pernyataan_aktif');
            $table->string('nama_jurnalis');
            $table->string('email_jurnalis')->unique();
            $table->string('nomor_kontak_jurnalis');
            $table->string('kartu_pers');
            $table->string('sertifikat_ukw');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upload_persyaratans');
    }
};
