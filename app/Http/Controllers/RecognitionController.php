<?php

namespace App\Http\Controllers;

use App\Recognition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Jenssegers\ImageHash\ImageHash;
use Jenssegers\ImageHash\Implementations\DifferenceHash;
use Google\Cloud\Vision\VisionClient;
use function MongoDB\BSON\fromJSON;
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
    public function deleteFromDatabase(Request $request){
        $this->validate($request, [
            'path' => 'required',
        ]);

        $image_parts = explode(";base64,", $request['path']);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $fileName = uniqid() . '.jpg';

        $pathBlacklistSymlink = "../public/storage/blacklist/$fileName";
        $pathTempSymlink = "../public/storage/temp/$fileName";
        $pathTemp = "public/temp/$fileName";
        $pathBlacklist = "public/blacklist/$fileName";

        //file_put_contents($filePath, $image_base64);
        Storage::disk('local')->append($pathTemp, $image_base64);
        /*        Storage::disk('local')->append($pathBlacklist, $image_base64);
                $recognition = new Recognition();
                $recognition->path = $pathBlacklistSymlink;
                $recognition->save();*/

        $hasher = new ImageHash(new DifferenceHash());
        $data = Recognition::all();
        foreach ($data as $item){
            $hash2 = $hasher->hash($pathTempSymlink); //tik symlinkus gaudo
            $hash1 = $hasher->hash($item->path);
            $distance = $hasher->distance($hash1, $hash2);
            if($distance < 10){
                return "Rastas";
            }else{
                return "nerasta";
            }
        }
        /*        $hasher = new ImageHash(new DifferenceHash());
                $hash1 = $hasher->hash('../public/storage/blacklist/5c8cfe13adfe2.jpg');
                $hash2 = $hasher->hash('../public/storage/blacklist/5c8d04b14230a.jpg');

                $distance = $hasher->distance($hash1, $hash2);
                echo $distance;*/
        //$pathBlacklist = Storage::disk('local')->move("public/temp/domis.jpg", "public/users_blacklist/domis.jpg");
        /*        $image = fopen($filePath, 'r');
                $vision = new VisionClient(['keyFile' => json_decode(file_get_contents('../public/faceRecognition.json'), true)], true);
                $visionImage = $vision->image($image, ['FACE_DETECTION']);
                $result = $vision->annotate($visionImage);



                $hash1 = $hasher->hash('../public/temp/1.jpg');
                $hash2 = $hasher->hash('../public/temp/w5.jpg');

                $distance = $hasher->distance($hash1, $hash2);



                echo $distance;*/


        //return '<img src="'.asset('temp/'.$fileName).'">';
        //return var_dump($result);
    }

    public function insertIntoDatabase(Request $request){

    }
}
