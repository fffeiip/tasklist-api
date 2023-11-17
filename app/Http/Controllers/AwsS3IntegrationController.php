<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Events\FileUploadedToS3;
class AwsS3IntegrationController extends Controller
{
    public function uploadFile(Request $request)
    {
        $filename = 'scramble.png';
        $path = storage_path('app/public/images/' . $filename);
        if (!file_exists($path)) {
            abort(404);
        }

        $file = file_get_contents($path);
        $type = mime_content_type($path);
        Storage::disk('s3')->put('scramble3.png',$file);
        $file_size = Storage::disk('s3')->size('scramble3.png');
        $poster_path = Storage::disk('s3')->url('scramble3.png');
        return response()->json(['message' => "success",'file'=>['size_bytes'=>$file_size, 'path'=>$poster_path]], 201);
    }
    
    public function downloadFile(Request $request)
    {
        // Adicionar restrições
       return Storage::disk('s3')->downloadFile('scramble.png');

    }

    public function readFile (Request $request)
    {
        // Adicionar restrições
        return Storage::disk('s3')->response('scramble.png');
    }

}
