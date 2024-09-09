<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class MediaFIle extends Model
{

    public function clean($string)
    {
        $string = str_replace(' ', '-', $string); # Replaces all spaces with hyphens.
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); # Removes special chars.
    }

    public static function fileUpload($request, $fieldName, $path, $oldFile = null)
    {
        try {
            $result = [];
            if (!empty($request->file($fieldName))) {
                if ($path) {
                    $uploadedPath = $path;
                } else {
                    $uploadedPath = 'uploads/';
                }
                if (!is_null($oldFile)) {
                    $oldPhoto = $path . '/' . $oldFile;
                    if (File::exists(public_path($oldPhoto))) {
                        File::delete(public_path($oldPhoto));
                    }
                }

                $file = $request->file($fieldName);
                $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $fileRename = strtolower($fileName);
                $fileName = $fileRename . time() . '.' . $file->extension();
                $request->$fieldName->move(public_path($uploadedPath), $fileName);
                $returnPath = asset('public/' . $uploadedPath . '/' . $fileName);
                $result = ['status' => 1, 'message' => 'File uploaded successfully', 'file_name' => $fileName, 'path' => $returnPath];
            } else {
                $result = ['message' => 'File uploading error', 'file_name' => '', 'path' => ''];
            }
        } catch (\Exception $ex) {
            $result = [
                'line' => $ex->getLine(),
                'file' => $ex->getFile(),
                'message' => $ex->getMessage(),
            ];
        }
        return $result;
    }

    public static function UploadMultipleFiles($request, $fieldName, $path, $oldFiles = [])
    {
        try {
            $result = [];
            if (!empty($request->file($fieldName))) {
                $uploadedPath = $path ? $path : 'uploads/';

                foreach ($request->file($fieldName) as $file) {
                    // Now $file is an individual file, so you can operate on it
                    if ($file) {
                        $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                        $fileRename = strtolower($fileName);
                        $fileName = $fileRename . time() . '.' . $file->extension();
                        $file->move(public_path($uploadedPath), $fileName);
                        $returnPath = asset('public/' . $uploadedPath . '/' . $fileName);
                        $result[] = [
                            'status' => 1,
                            'message' => 'File uploaded successfully',
                            'file_name' => $fileName,
                            'path' => $returnPath,
                        ];
                    }
                }

                // Delete old files if provided
                foreach ($oldFiles as $oldFile) {
                    $oldPhoto = $path . '/' . $oldFile;
                    if (File::exists(public_path($oldPhoto))) {
                        File::delete(public_path($oldPhoto));
                    }
                }
            } else {
                $result[] = ['message' => 'No files to upload'];
            }
        } catch (\Exception $ex) {
            $result[] = [
                'line' => $ex->getLine(),
                'file' => $ex->getFile(),
                'message' => $ex->getMessage(),
            ];
        }
        return $result;
    }

}
