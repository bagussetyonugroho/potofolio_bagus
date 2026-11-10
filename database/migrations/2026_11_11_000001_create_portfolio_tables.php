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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('role', 100)->default('Visitor');
            $table->string('avatar_color', 50)->default('indigo');
            $table->text('content');
            $table->unsignedInteger('likes')->default(0);
            $table->boolean('is_pinned')->default(false);
            $table->timestamps();
        });

        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120);
            $table->string('email', 150);
            $table->string('subject', 200);
            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
        Schema::dropIfExists('comments');
    }
};
