<?php

namespace App\Jobs;

use App\Models\Document;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;

class SendDocumentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    private Document $document;

    public function __construct(protected array $documentArr) 
    {
        $this->document = new Document;
    }
    
    public function handle(): void
    {

        $this->document->category_id = $this->documentArr['category_id'];
        $this->document->title = $this->documentArr['title'];
        $this->document->contents = $this->documentArr['contents'];        

        $this->document->save();
    }    
}
