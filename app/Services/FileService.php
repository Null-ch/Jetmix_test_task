<?php

namespace App\Services;

class FileService
{
    /**
     * Uploading a file to the server
     *
     * @param mixed $file
     * 
     * @return string
     * 
     */
    public function store($file): string
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/files/', $filename);
        $path = 'storage/files/' . $filename;

        return $path;
    }

    /**
     * Creating a link to download a file
     *
     * @param string $filename
     * 
     * @return string|null
     * 
     */
    public function download(string $filename): ?string
    {
        $file_path = storage_path('app/public/files/' . $filename);

        if (file_exists($file_path)) {
            return $file_path;
        } else {
            return null;
        }
    }
}
