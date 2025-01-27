<?php

namespace App;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * store files locally also on the database
 * @param Request
 *
*/
trait FileUpload
{
    function upload(UploadedFile $file,string $dictionary =null): string
    {
        $file->move(public_path($dictionary), $file->getClientOriginalName());
        return "/{$dictionary}/{$file->getClientOriginalName()}";
    }
    function deleteFile(string $file): bool
    {
        if(File::exists(public_path($file))){
            File::delete(public_path($file));
            return true;
        }
        return false;
    }
}
