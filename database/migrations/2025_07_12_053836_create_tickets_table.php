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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('details');
            $table->string('customer_name');
            $table->string('customer_number');
            $table->string('customer_email')->nullable();
            $table->string('customer_phone');
            $table->foreignId('customer_segment_id')->constrained('customer_segments');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('caller_types_id')->constrained();
            $table->foreignId('call_types_id')->constrained();
            $table->foreignId('channels_id')->constrained();
            $table->foreignId('categories_id')->constrained();
            $table->foreignId('subcategories_id')->constrained();
            $table->foreignId('assigned_to')->nullable()->constrained('users');
            $table->date('target_date');
            $table->enum('service_level', ['low', 'medium', 'high', 'critical']);
            $table->enum('conflict_level', ['low', 'medium', 'high', 'critical']);
            $table->enum('status', ['open', 'assigned', 'in_progress', 'resolved', 'closed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
