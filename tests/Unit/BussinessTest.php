<?php

namespace Tests\Unit;

use App\Models\Bussiness;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class BussinessTest extends TestCase
{
    use DatabaseMigrations;

    public function test_new_bussiness_can_be_registered(){
        $data = [
            "name"=> "PopyItSoft",
            'bussiness_email'=> "bussiness@gmail.com",
            'bussiness_phone'=> "+8801743920880",
            'bussiness_logo'=> 'logo.png',
        ];

        Bussiness::create($data);
        $bussiness = Bussiness::first();

        $this->assertEquals($bussiness->name, "PopyItSoft");
        $this->assertEquals($bussiness->bussiness_email, "bussiness@gmail.com");
        $this->assertEquals($bussiness->bussiness_phone, "+8801743920880");
    }
}
