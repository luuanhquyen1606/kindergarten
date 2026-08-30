<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Image\Image;


class FilesController extends BaseController
{
    public function upload(Request $request){
        
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename =  $file->getClientOriginalName();
            $size = $file->getSize(); // returns bytes
            // Move to public/uploads
            $file->move(public_path('uploads'), $filename);

            // Return public URL
            $url = url('uploads/' . $filename);
            
            $sizeKB = round($size / 1024, 2);
            $sizeMB = round($size / (1024 * 1024), 2);

            $filePath = public_path('uploads/' . $filename);
             
             $destinationPath = public_path('/uploads/');
             $destinationPathThumbnail = public_path('thumbnails/');
            Image::load($filePath)
                ->width(500)
                ->height(500)
                ->quality(100)
                ->save($destinationPathThumbnail. $filename);
            $thumb_url = url('thumbnails/' . $filename);

            return response()->json([
                'success' => true,
                'filename' => $filename,
                'url' => $url,
                'thumb_url' => $thumb_url,
                'size_bytes' => $size,
                'size_kb' => $sizeKB,
                'size_mb' => $sizeMB,
            ]);
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded']);

    }
    
}


