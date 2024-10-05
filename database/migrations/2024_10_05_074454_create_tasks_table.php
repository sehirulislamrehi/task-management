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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("description");
            $table->enum('status', array_map(fn($case) => $case->value, \App\Enum\TaskStatusEnum::cases()))
                ->comment(implode(',', array_map(fn($case) => $case->value, \App\Enum\TaskStatusEnum::cases())));
            $table->date("due_date");
            $table->unsignedBigInteger("assigned_to");
            $table->unsignedBigInteger("assigned_by");
            $table->string("image")->nullable();
            $table->date("start_date");
            $table->date("done_date")->nullable();
            $table->string("time_taken")->default(0)->comment("value stored in sec.");
            $table->timestamps();

            $table->foreign("assigned_to")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("assigned_by")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
