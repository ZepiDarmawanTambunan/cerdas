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
        Schema::create('pemeriksaan_tes_kematangan_sekolah', function (Blueprint $table) {
            $table->id();
            $table->char('KUNJUNGAN', 19);
            $table->string('NOMOR_SURAT');
            $table->string('TUJUAN_PEMERIKSAAN');
            $table->string('PENDIDIKAN');
            $table->date('TANGGAL');
            $table->string('PENGAMATAN_BENTUK_DAN_KEMAMPUAN_MEMBEDAKAN');
            $table->string('MOTORIK_HALUS');
            $table->string('PENGERTIAN_JUMLAH_DAN_PERBANDINGAN');
            $table->string('PENGAMATAN_TAJAM');
            $table->string('PENGAMATAN_KRITIS');
            $table->string('KONSENTRASI');
            $table->string('DAYA_INGAT');
            $table->string('PENGERTIAN_TENTANG_OBJEK_DAN_PENILAIAN_TERHADAP_SITUASI');
            $table->string('PEMAHAMAN_CERITA');
            $table->string('MENGGAMBAR_MANUSIA');
            $table->text('HASIL_OBSERVASI');
            $table->text('KESIMPULAN');
            $table->text('VERIFIKASI')->nullable();
            $table->timestamp('TANGGAL_VERIFIKASI')->nullable();
            $table->boolean('STATUS')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan_tes_kematangan_sekolah');
    }
};
