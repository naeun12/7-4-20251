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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id');        // ID of who sent the notification
            $table->string('sender_type');                  // 'landlord' or 'tenant'
        
            $table->unsignedBigInteger('receiver_id');      // ID of who will receive
            $table->string('receiver_type');                // 'landlord' or 'tenant'
        
            $table->string('title');                        // Notification title
            $table->text('message');                        // Notification message
        
            $table->boolean('is_read')->default(false);     // Read status
            $table->timestamp('read_at')->nullable();       // Optional read timestamp
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');

    }
};
