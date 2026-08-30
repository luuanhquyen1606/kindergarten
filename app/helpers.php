<?php
if (! function_exists('getPhotoThumbnail')) {
    function getPhotoThumbnail($id,$size=1024){
        $file = $post = DB::table('files')
        ->where('id', $id) 
        ->first();
        $filepath = $file->path;
       
        $thumb='';
        if(strpos($file->mime_type,'image') !== false)
            {
            $setpath=addPostfix($filepath,"_".$size);
            $setpath = preg_replace('/\.[^.]+$/', '.webp', $setpath);
            if(file_exists( public_path().$setpath))
                {
                    $thumb = $setpath;
                }
                else{
                    resizeImageByWidth($filepath,$setpath,$size,99);
                    $thumb = $setpath;
                }
            }
        if(strpos($file->mime_type,'video') !== false)
            {
            $setpath=addPostfix($filepath,"_".$size);
            $setpath = preg_replace('/\.[^.]+$/', '.webp', $setpath);
            if(file_exists( public_path().$setpath))
                {
                    $thumb = $setpath;
                }
                else{
                    $videoPath = public_path().$file->path;
                    $thumbnailPath=public_path().$setpath;

                    $command = "ffmpeg -i $videoPath -ss 00:00:01 -vframes 1 $thumbnailPath";
                    exec($command, $output, $status);  


                    resizeImageByWidth($filepath,$setpath,$size,99);
                    $thumb = $setpath;
                }
            }
            return $thumb;
    }
}
if (! function_exists('getPhotoUrl')) {
    function getPhotoUrl($id){
        $file = $post = DB::table('files')
        ->where('id', $id) 
        ->first();
        if(!$file) {return '/assets/admin/trans.png';}
        return $file->path;
    }
}
function getSlug($title,$entity,$entity_id,$school_id){
    $slug = Str::slug($title);
        $existingSlugCount = DB::table('routings')
            ->where('slug', 'LIKE', $slug . '%')
            ->where('school_id', $school_id)
            ->count();
        $slug = $slug . ($existingSlugCount > 0 ? '-' . ($existingSlugCount + 1) : '');

        $routing_id=DB::table('routings')->insertGetId([
        'slug' => $slug,
        'title' => $title,
        'entity' => $entity,
        'entity_id' => $entity_id,
        'school_id' => $school_id,
        'created_at' => now(),
        'updated_at' => now(),
         ]);
         $routing = DB::table('routings')
            ->where('id', $routing_id)
            ->first();
 
        return $routing;
        
}

function updateSlug($id,$title,$school_id){
  
        $slug = Str::slug($title);
        $existingSlugCount = DB::table('routings')
            ->where('slug', 'LIKE', $slug . '%')
            ->where('school_id', $school_id)
            ->whereNot('id', $id)
            ->count();
        $slug = $slug . ($existingSlugCount > 0 ? '-' . ($existingSlugCount + 1) : '');
  
         DB::table('routings')
            ->where('id', $id)
            ->update(['slug' => $slug,'title'=>$title]);

         $routing = DB::table('routings')
            ->where('id', $id)
            ->first();
 
        return $routing;
        
}

if (!function_exists('getRoutingUrl')) {
    function getRoutingUrl($id){
        if(!$id){
            return '#';
        }
        $routing = DB::table('routings')
            ->where('id', $id)
            ->first();

        if(!$routing){
            return '#';
        }

        return '/'.$routing->slug;
    }
}

if (!function_exists('getRoutingTitle')) {
    function getRoutingTitle($id){
        if(!$id){
            return '';
        }
        $routing = DB::table('routings')
            ->where('id', $id)
            ->first();

        if(!$routing){
            return '';
        }

        return ($routing->entity=='pages' ? '[Trang] ' : '[Bài viết] ').($routing->title ?: $routing->slug);
    }
}

if (!function_exists('getImageSet')) {
    function getImageSet($filepath,$sizes = [1024,640]){
      //echo $filepath;die();
    $filepath=parse_url($filepath, PHP_URL_PATH);
   
    $sets=[]; 

    if(!file_exists('/var/www/kidoo/public/'.$filepath))
    {
       //echo "'".$filepath."',";     
    }
    else{
    foreach ($sizes as $size){
        $setpath=addPostfix($filepath,"_thumb_99_".$size);
        $setpath = preg_replace('/\.[^.]+$/', '.webp', $setpath);
       
     
        if(file_exists('/var/www/kidoo/public/'.$setpath))
            {
                $sets[$size] = $setpath;
            }
            else{
                resizeImageByWidth($filepath,$setpath,$size,99);

                $sets[$size] = $setpath;
            }
    }
    }
    return arrayToSrcset($sets);
}
}


function arrayToSrcset($images) {
    $parts = [];

    foreach ($images as $width => $url) {
        $parts[] = $url . ' ' . $width . 'w';
    }

    return implode(', ', $parts);
}
function resizeImageByWidth($source, $destination, $newWidth, $quality = 100) {
    $source ='/var/www/kidoo/public/'.$source;
    $destination ='/var/www/kidoo/public/'.$destination;
    try {
        $image = new Imagick($source);

        // Auto-rotate based on EXIF (important for photos)
        $image->autoOrient();

        // Resize while keeping aspect ratio
        $image->resizeImage(
            $newWidth,
            0, // auto height
            Imagick::FILTER_LANCZOS,
            1
        );

        // Set compression quality
        $image->setImageCompressionQuality($quality);

        // Optional: strip metadata (smaller file)
        $image->stripImage();

        // Save
        $image->writeImage($destination);

        $image->clear();
        $image->destroy();
        return $destination;

    } catch (Exception $e) {
        throw new Exception("Resize failed: " . $e->getMessage());
    }
}
function addPostfix($filename, $postfix) {
    $dotPos = strrpos($filename, '.');

    if ($dotPos === false) {
        return $filename . $postfix; // no extension
    }

    $name = substr($filename, 0, $dotPos);
    $ext  = substr($filename, $dotPos);

    return $name . $postfix . $ext;
}