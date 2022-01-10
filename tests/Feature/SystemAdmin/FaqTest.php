<?php

namespace Tests\Feature\SystemAdmin;

use App\Helpers\UserRole;
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
        $this->admin->assignRole(UserRole::SYSTEM_ADMIN);
    }

    public function test_faq_create_page_can_be_rendered(){
        $response = $this->actingAs($this->admin)->get(route('system_admin.faq.create'));
        $response->assertOk();
        $response->assertViewIs('system_admin.faq.create');
    }

    public function test_faq_index_page_can_be_rendered(){
        $response = $this->actingAs($this->admin)->get(route('system_admin.faqs.index'));
        $response->assertOk();
        $response->assertViewIs('system_admin.faq.index');
    }

    




    public function test_faq_can_be_stored(){
        $data = [
            'question' => 'This is a question',
            'answer' => 'This is the answer',
            'priority'=> 1,
        ];

        $this->actingAs($this->admin)->post(route('system_admin.faq.store'), $data);

        $faq = Faq::first();
        $this->assertEquals($faq->question, 'This is a question');
        $this->assertEquals($faq->answer, 'This is the answer');
        $this->assertEquals($faq->priority, 1);
    }
}
