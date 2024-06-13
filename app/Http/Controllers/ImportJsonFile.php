<?php

namespace App\Http\Controllers;

use App\Jobs\SendDocumentJob;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ImportJsonFile extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'filename' => 'required|date_format:Y-m-d'
        ]);


        $filename = $request->filename;

        $arrayfile = $this->openJsonFile($filename);
        
        session(['file' => $arrayfile]);        

        return redirect('document/confirm');
    }

    private function openJsonFile($filename): Array
    {
        return File::json(base_path("storage/data/{$filename}.json"), JSON_THROW_ON_ERROR);
    }    
}
