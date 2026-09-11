<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Image\Image;
use Illuminate\Support\Facades\File;

 
class UploadsController extends BaseController
{
    public function upload(Request $request){
        


        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename =  time()."_".$file->getClientOriginalName();
            $originalName = $file->getClientOriginalName();
            $size = $file->getSize(); // returns bytes
            $mime = $file->getMimeType();
            // Move to public/uploads

            $folder = 'files'."/".$this->app['school']->id;
            if (!File::exists(public_path($folder))) {
                File::makeDirectory(public_path($folder), 0755, true);
            }
            $file->move(public_path($folder), $filename);

            // Return public URL
            $url = url($folder.'/' . $filename);
            
            $sizeKB = round($size / 1024, 2);
            $sizeMB = round($size / (1024 * 1024), 2);

            $filePath = public_path($folder.'/' . $filename);
            $relativePath = '/'.$folder.'/' . $filename;

            $file_id=DB::table('files')->insertGetId([
                'name' => $filename,
                'original_name' => $originalName, 
                'size' => $size,
                'school_id' => $this->app['school']->id,
                'user_id' => $request->user()->id,
                'path' => $relativePath,
                'mime_type' => $mime,
                'created_at' => now(),
                'updated_at' => now(),
                ]);
           
            if (str_starts_with($mime, 'image/')) 
            {
                DB::table('files')
                ->where('id', $file_id)
                ->update([
                        'thumbnail' => $relativePath,
                ]);
            
            }
            if (str_starts_with($mime, 'video/')) 
            {
                $videoPath=  public_path().$relativePath;
                $info = pathinfo($relativePath);

                $thumbnailRelativePath = $info['dirname'] . '/' .$info['filename'] . '.jpg';
                $thumbnailPath=public_path().$thumbnailRelativePath;

                $command = "ffmpeg -i $videoPath -ss 00:00:01 -vframes 1 $thumbnailPath";
                exec($command, $output, $status);

                DB::table('files')
                ->where('id', $file_id)
                ->update([
                        'thumbnail' => $thumbnailRelativePath,
                ]);
            }
            $file = DB::table('files') 
            ->where('id', $file_id) 
            ->first(); 

            /*
            $videoPath= "/var/www/kidoo/public/files/1/1779871954_00db52ea-c50b-4e1a-bf19-855ad133242c-watermark.mp4";
            $thumbnailPath="/var/www/kidoo/public/files/1/1779871954_00db52ea-c50b-4e1a-bf19-855ad133242c-watermark.jpg";
            $command = "ffmpeg -i $videoPath -ss 00:00:03 -vframes 1 $thumbnailPath";

            exec($command, $output, $status); 

            if ($status === 0) {
                echo "Thumbnail generated";
            } else {
                echo "Failed";
                print_r($output);
            }
            */




            return response()->json($file);
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded']);

    }
    
}


