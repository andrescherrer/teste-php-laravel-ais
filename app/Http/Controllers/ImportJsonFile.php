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
    private string $find_string = "/import/";

    public function __invoke(Request $request)
    {
        $filename = Str::after($request->getRequestUri(), $this->find_string);

        $arrayfile = $this->openJsonFile($filename);

        Arr::map($arrayfile['documentos'], function($value) {
            
            $category = Category::where('name', $value['categoria'])->first();
            
            $documentArr['category_id'] = $category->id;
            $documentArr['title'] = $value['titulo'];
            $documentArr['contents'] = $value['conteúdo'];

            SendDocumentJob::dispatch($documentArr);
        });
    }

    private function openJsonFile($filename): Array
    {
        return File::json(base_path("storage/data/{$filename}.json"), JSON_THROW_ON_ERROR);
    }    
}
