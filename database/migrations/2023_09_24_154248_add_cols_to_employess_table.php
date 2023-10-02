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
        Schema::table('employees', function (Blueprint $table) {
            $table->string("SocialnsuranceNumber",50)->nullable();
            $table->string("MedicalinsuranceNumber",50)->nullable();
            $table->string("emp_basic_stay_com",50)->nullable()->comment('عنوان اقامة الموضف في بلده الام');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            //
        });
    }
};
