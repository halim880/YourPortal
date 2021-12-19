<?php

namespace Tests\Feature\Super_admin;

use App\Models\Faq;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class FaqTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp():void{
        parent::setUp();
        $this->withoutExceptionHandling();

        $this->admin = User::factory()->create();
        Role::create(['name'=>'super_admin']);
        $this->admin->assignRole('super_admin');
    }

    public function test_faq_can_be_stored(){
        $data = [
            'question' => 'This is a question',
            'answer' => 'This is the answer',
        ];

        $this->actingAs($this->admin)->post(route('super_admin.faq.store'), $data);

        $faq = Faq::first();
        $this->assertEquals($faq->question, 'This is a question');
        $this->assertEquals($faq->answer, 'This is the answer');
    }
}
