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
        Schema::create('repair_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('ro_number', 100);
            $table->unsignedBigInteger('device_id');
            $table->timestamp('received_date')->nullable();
            $table->string('issue_description', 255)->nullable();
            $table->string('diagnostics', 255)->nullable();
            $table->string('status', 30)->nullable();
            $table->decimal('estimated_cost', 10 ,2);
            $table->decimal('final_cost', 10 ,2);
            $table->timestamp('delivery_date')->nullable();
            $table->string('note', 255)->nullable();
            $table->timestamp('created_at')->useCurrent();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repair_jobs');
    }
};