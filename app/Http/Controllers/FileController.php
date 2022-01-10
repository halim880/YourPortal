<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index(){
        return view('member.files.index')->with([
            'folders'=> Folder::all(),
        ]);
    }

    public function storeFolder(){
        Folder::create([
            'name'=> request('name'),
            'parent_id'=> request('parent_id'),
        ]);

        return response()->json(['message'=> "Folder created"]);
    }

    public function deleteFolder(Folder $folder){
        $folder->delete();
        return response()->json(['message'=> "Folder is deleted"]);
    }
}
