<?php

namespace Tests\Unit;

use App\Models\Document;
use PHPUnit\Framework\TestCase;

class DocumentUnitTest extends TestCase
{    
    public function test_check_size_contents_field_less_than_115(): void
    {
        $document = new Document;
        $document->title = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit';
        $document->contents = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit';

        // $document->contents tem 111 caracteres

        $this->assertLessThan(115, strlen($document->contents));
    }
}


