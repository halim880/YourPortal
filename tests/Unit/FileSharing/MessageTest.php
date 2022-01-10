<?php

namespace Tests\Unit\FileSharing;

use App\Helpers\MessageType;
use App\Models\ChatRoom;
use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class MessageTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp() : void {
        parent::setUp();
        $this->user = User::factory()->create(['name'=> 'Akash Ahmad']);
    }

    public function test_message_can_be_created(){
        $message = $this->createMessage();
        $this->assertEquals($message->type, MessageType::TEXT);
        $this->assertEquals($message->text, 'This the first message');
    }

    public function test_message_has_a_sender(){
        $message = $this->createMessage();
        $this->assertEquals($message->getSenderName(), 'Akash Ahmad');
    }

    public function test_message_has_a_sending_time(){
        $message = $this->createMessage();
        $this->assertEquals($message->getSendingTime(), '1 second ago');
    }

    public function test_is_sender_function_returns_boolean(){
        $message = $this->createMessage();
        $this->assertTrue($message->isSender($this->user));
    }

    private function createMessage($data = []) : Message {
        return Message::create(array_merge([
            'type' => MessageType::TEXT,
            'sender_id'=> $this->user->id,
            'chat_room_id' => ChatRoom::create(['name'=> 'First room'])->id,
            'text' => 'This the first message',
            'file' => null,
        ], $data));
    }
}
