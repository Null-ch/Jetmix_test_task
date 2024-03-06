<?php

namespace App\Http\Controllers;

use App\Services\FileService;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    protected $fileService;
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    /**
     * Downloading the attached file
     *
     * @param mixed $filename
     * 
     * @return \Illuminate\Http\Response
     * 
     */
    public function getAttachedFile($filename)
    {
        $file_path = $this->fileService->download($filename);
        
        if ($file_path) {
            return response()->download($file_path);
        } else {
            abort(404, 'File not found');
        }
    }
}
