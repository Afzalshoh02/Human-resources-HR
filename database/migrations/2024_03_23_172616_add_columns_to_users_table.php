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
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->date('hire_date')->nullable();
            $table->string('job_id')->nullable();
            $table->string('salary')->nullable();
            $table->string('commission_pct')->nullable();
            $table->string('manager_id')->nullable();
            $table->string('department_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('last_name');
            $table->dropColumn('phone_number');
            $table->dropColumn('hire_date');
            $table->dropColumn('job_id');
            $table->dropColumn('salary');
            $table->dropColumn('commission_pct');
            $table->dropColumn('manager_id');
        });
    }
};
