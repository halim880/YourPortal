<?php

use App\Helpers\MessageType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default(MessageType::TEXT);
            $table->string('text')->nullable();
            $table->foreignId('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('chat_room_id')->references('id')->on('chat_rooms')->onDelete('cascade');
            $table->string('file')->nullable();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
