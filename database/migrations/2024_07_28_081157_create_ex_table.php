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
        Schema::create('ex', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('reason_to_separate');
            $table->date('date_of_separation');
            $table->date('date_of_start_dating');
            $table->string('phone_number');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ex');
    }
};
