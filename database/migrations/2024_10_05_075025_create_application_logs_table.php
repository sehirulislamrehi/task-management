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
        Schema::create('application_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->enum('entity_name',array_map(fn($case)=>$case->value,\App\Enum\LogEntityEnum::cases()))->nullable()
                ->comment(implode(',', array_map(fn($case) => $case->value, \App\Enum\LogEntityEnum::cases())));
            $table->unsignedBigInteger('entity_id')->nullable();
            $table->enum('log_action',array_map(fn($case)=>$case->value,\App\Enum\LogEventType::cases()))
                ->comment(implode(',',array_map(fn($case)=>$case->value,\App\Enum\LogEventType::cases())));
            $table->string('log_message');
            $table->json('response')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_logs');
    }
};
