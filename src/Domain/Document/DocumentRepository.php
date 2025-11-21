<?php

namespace App\Domain\Document;

interface DocumentRepository
{
    public function find(string $id): ?Document;
    public function save(Document $document): void;
}
