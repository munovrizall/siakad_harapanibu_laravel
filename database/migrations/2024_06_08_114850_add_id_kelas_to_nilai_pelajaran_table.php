<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdKelasToNilaiPelajaranTable extends Migration
{
    public function up()
    {
        Schema::table('nilai_pelajaran', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kelas')->nullable()->after('id_siswa');
        });
    }

    public function down()
    {
        Schema::table('nilai_pelajaran', function (Blueprint $table) {
            $table->dropColumn('id_kelas');
        });
    }
}

