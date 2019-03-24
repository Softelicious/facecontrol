<?php

namespace App\Http\Controllers;

use App\Recognition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\ImageHash\ImageHash;
use Jenssegers\ImageHash\Implementations\DifferenceHash;
use Illuminate\Support\Facades\Storage;

class RecognitionController extends Controller
{
    public function checkDatabaseForMatch(Request $request)
    {
        $this->validate($request, [
            'path' => 'required',
            'username' => 'required'
        ]);

        $image_parts = explode(";base64,", $request['path']);
        $image_base64 = base64_decode($image_parts[1]);

        $fileName = uniqid() . '.jpg';

        $pathBlacklistSymlink = "../public/storage/blacklist/$fileName";
        $pathTempSymlink = "../public/storage/temp/$fileName";
        $pathTemp = "public/temp/$fileName";
        $pathBlacklist = "public/blacklist/$fileName";

        Storage::disk('local')->append($pathTemp, $image_base64);

        $hasher = new ImageHash(new DifferenceHash());
        $data = Recognition::all();
        foreach ($data as $item){
            $hash2 = $hasher->hash($pathTempSymlink); //tik symlinkus gaudo
            $hash1 = $hasher->hash($item->path);
            $distance = $hasher->distance($hash1, $hash2);

            if($distance < 8){
                $data = [
                    'username' => $request['username'],
                    'message2' => "Vartotojas yra ATPAŽINTAS",
                    'message' => "Vartotojas yra atpažintas juodajame sąraše - NEPRALEISTI, nebent sumoka",
                    'filePath' => "public/blacklist/$item->name",
                    'filePathSym' => $item->path,
                    'fileName' => $item->name
                ];

                return view('layouts.content')->with('data', $data);
            }
        }
        $data = [
            'username' => $request['username'],
            'message' => "Vartotojas neatpažintas juodajame sąraše. Įtrauk į juodąjį sąrašą jei jis tau nepatinka",
            'message2' => "Vartotojas yra NEATPAŽINTAS",
            'filePath' => $pathTemp,
            'filePathSym' => $pathBlacklistSymlink,
            'fileName' => $fileName
        ];

        return view('layouts.content')->with('data', $data);
    }

}
