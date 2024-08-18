<?php

namespace App\Services;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class FileService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public static function upload_file(UploadedFile $new_file, $upload_location = '')
    {
        $file_path_without_public = '/files/'.$upload_location.'/';
        $file_path = public_path().'/files/'.$upload_location.'/';
        $file_name = $upload_location.'_'.Str::uuid().'.'.$new_file->getClientOriginalExtension();
        $new_file->move($file_path, $file_name);

        return $file_path_without_public.$file_name;
    }

    public static function getTypeFile(UploadedFile $file)
    {
        $extention = strtolower($file->getClientOriginalExtension());
        if($extention == 'mp4' || $extention == 'webm' || $extention == 'ogg' || $extention == 'mov')
            return "video";
        return "image";
    }

    public static function update_file(UploadedFile $new_file, $old_file_name, $upload_location = '')
    {
        $new_file_path_without_public = '/files/'.$upload_location.'/';
        $new_file_path = public_path().'/files/'.$upload_location.'/';
        $new_file_name = $upload_location.'_'.Str::uuid().'.'.$new_file->getClientOriginalExtension();
        $new_file->move($new_file_path, $new_file_name);
        try {
            unlink(public_path().$old_file_name);

            return $new_file_path_without_public.$new_file_name;
        } catch(Exception $e) {
            return $new_file_path_without_public.$new_file_name;
        }
    }

    public static function delete_file($file)
    {
        try {
            unlink(public_path().$file);

            return true;
        } catch(Exception $e) {
            return $e;
        }
    }
}
