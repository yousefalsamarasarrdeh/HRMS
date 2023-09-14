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
        Schema::create('monthes', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('name_en',50);
            $table->timestamps();
        });
        \Illuminate\Support\Facades\DB::table('monthes')->insert(
            [
          ['name'=>'يناير','name_en'=>'january'],
            ]

        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthes');
    }
};
