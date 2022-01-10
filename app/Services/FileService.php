<?php

namespace App\Services;

use Illuminate\Support\Str;

class FileService {

    const FILE_DIRECTORY = 'files';

    static function getFileName($file) : string {
        $ext = $file->getClientOriginalExtension();
        $name = Str::random().'.'.$ext;
        return $name;
    }

}

