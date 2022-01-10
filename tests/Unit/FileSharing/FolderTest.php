<?php

namespace Tests\Unit\FileSharing;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class FolderTest extends TestCase
{
    use DatabaseMigrations;

    public function test_folder_can_be_created(){
        $data = [
            'name'=> "Test folder",
            'parent_id' => 1,
            'member_id' => 1,
        ];
    }
}
