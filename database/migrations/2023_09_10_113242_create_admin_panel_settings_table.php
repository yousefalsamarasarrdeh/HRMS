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
        Schema::create('admin_panel_settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_name',250);
            $table->tinyInteger('saysem_status')->default('1');
            $table->string('image',250)->nullable();
            $table->string('phones',250);
            $table->string('address',250);
            $table->string('email',100);
            $table->integer('added_by');
            $table->integer('updated_by')->nullable();
            $table->integer('com_code');
            $table->decimal('after_miniute_calculate_delay',10,2)->default('0')->comment('بعد كم دقيقة نحسب تاخير حضور');
            $table->decimal('after_miniute_calculate_early_departure',10,2)->default('0')->comment('بعد كم دقيقة نحسب انصراف مبكر');
            $table->decimal('after_miniute_quarterday',10,2)->default('0')->comment('بعد كم دقيقة مجموع الانصرافات المبكرة والحضور المتاخر نخصم ربع يوم');
            $table->decimal('after_time_half_daycut',10,2)->default('0')->comment('بعد كم مرة تاخير او انصراف مبكر يخصم نصف يوم');
            $table->decimal('after_time_allday_daycut',10,2)->default('0')->comment('نخصم بعد كم مرة تاخير او انصراف مبكر يوم كامل');
            $table->decimal('monthly_vacation_balance',10,2)->default('0')->comment('رصيد اجازات الموضف الشهري');
            $table->decimal('after_days_begin_vacation',10,2)->default('0')->comment('بعد كم يوم ينزل للموضف رصيد اجازة');
            $table->decimal('first_balance_begin_vacation',10,2)->default('0')->comment('الرصيد الاولي للمرحلة عند تفعيل اجازات الموضف نثل نزول عشر ايام بعد 6 شهور للموضف');
            $table->decimal('sanctions_value_first_abcence',10,2)->default('0')->comment('قيمة خصم الايام بعد اول مرة غياب غير مبرر');
            $table->decimal('sanctions_value_second_abcence',10,2)->default('0');
            $table->decimal('sanctions_value_thaird_abcence',10,2)->default('0');
            $table->decimal('sanctions_value_forth_abcence',10,2)->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_panel_settings');
    }
};
