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
        Schema::table('settings', function (Blueprint $table) {
            $table->string('groom_name')->nullable();
            $table->string('bride_name')->nullable();
            $table->string('groom_fullname')->nullable();
            $table->string('bride_fullname')->nullable();
            $table->string('groom_parents')->nullable();
            $table->string('bride_parents')->nullable();
            $table->string('wedding_date')->nullable();
            $table->string('akad_date')->nullable();
            $table->string('akad_time')->nullable();
            $table->string('resepsi_date')->nullable();
            $table->string('resepsi_time')->nullable();
            $table->text('resepsi_location')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('bank_account_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'groom_name', 'bride_name', 'groom_fullname', 'bride_fullname', 
                'groom_parents', 'bride_parents', 'wedding_date', 'akad_date', 
                'akad_time', 'resepsi_date', 'resepsi_time', 'resepsi_location', 
                'bank_name', 'bank_account', 'bank_account_name'
            ]);
        });
    }
};
