<?php

namespace App\Domain\Document\Event;

class DocumentPublishedEvent
{
    private string $documentId;

    public function __construct(string $documentId)
    {
        $this->documentId = $documentId;
    }

    public function getDocumentId(): string
    {
        return $this->documentId;
    }
}
