<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('wargas', function (Blueprint $table) {
            if (!Schema::hasColumn('wargas', 'jenis_kelamin')) {
                $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable()->after('no_kk');
            }

            if (!Schema::hasColumn('wargas', 'status_rumah')) {
                $table->enum('status_rumah', ['Hak Milik', 'Sewa'])->nullable()->after('alamat');
            }
        });
    }

    public function down(): void
    {
        Schema::table('wargas', function (Blueprint $table) {
            $table->dropColumn(['jenis_kelamin', 'status_rumah']);
        });
    }
};
