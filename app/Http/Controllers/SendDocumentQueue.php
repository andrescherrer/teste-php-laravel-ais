<?php

namespace App\Http\Controllers;

use App\Jobs\SendDocumentJob;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class SendDocumentQueue extends Controller
{
    public function __invoke(Request $request)
    {
        $arrayfile = session()->get('file');

        Arr::map($arrayfile['documentos'], function($value) {
            
            $category = Category::where('name', $value['categoria'])->first();
                        
            $documentArr['category_id'] = $category->id;
            $documentArr['title'] = $value['titulo'];
            $documentArr['contents'] = $value['conteúdo'];

            SendDocumentJob::dispatch($documentArr);
        });

        return redirect('document/sent');
    }
}
