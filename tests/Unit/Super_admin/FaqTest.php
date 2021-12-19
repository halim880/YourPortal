<?php

namespace Tests\Unit\Super_admin;

use App\Models\Faq;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use Tests\TestCase;

class FaqTest extends TestCase
{
    use DatabaseMigrations;

    public function test_faq_can_be_created(){
        $data = [
            'question'=> 'This is first question?',
            'answer'=> 'This is the answer of first question'
        ];

        Faq::create($data);
        $faq = Faq::first();
        $this->assertNotNull($faq);
        $this->assertEquals($faq->question, 'This is first question?');
        $this->assertEquals($faq->answer, 'This is the answer of first question');
    }
}
