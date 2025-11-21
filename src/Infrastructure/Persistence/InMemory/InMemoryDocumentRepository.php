<?php

namespace App\Infrastructure\Persistence\InMemory;

use App\Domain\Document\Document;
use App\Domain\Document\DocumentRepository;

class InMemoryDocumentRepository implements DocumentRepository
{
    private array $documents = [];

    public function __construct()
    {
        // Seed for demo
        $this->documents['123'] = new Document('123', 'Demo Document');
        $this->documents['123']->submitForReview();
    }

    public function find(string $id): ?Document
    {
        return $this->documents[$id] ?? null;
    }

    public function save(Document $document): void
    {
        $this->documents[$document->getId()] = $document;
    }
}
