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
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('sender_id');
            $table->unsignedBiginteger('recipient_id');
            $table->text('body');
            $table->boolean('is_opened')->default(false);
            $table->timestamps();

            $table->foreign('sender_id')->references('id')->on('users')
                  ->onDelete('cascade');
            $table->foreign('recipient_id')->references('id')->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversations');
    }
};
