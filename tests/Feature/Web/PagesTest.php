<?php

namespace Tests\Feature\Web;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PagesTest extends TestCase
{
    public function test_contact_page_can_be_rendered(){
        $response = $this->get(route('web.contact'));
        $response->assertOk();
        $response->assertViewIs('web.contact');
    }

    public function test_faq_page_can_be_rendered(){
        $response = $this->get(route('web.faq'));
        $response->assertOk();
        $response->assertViewIs('web.faq');
    }

    public function test_service_page_can_be_rendered(){
        $response = $this->get(route('web.service'));
        $response->assertOk();
        $response->assertViewIs('web.service');
    }
}
