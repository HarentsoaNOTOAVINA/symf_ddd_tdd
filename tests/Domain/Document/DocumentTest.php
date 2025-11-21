<?php

namespace App\Tests\Domain\Document;

use App\Domain\Document\Document;
use App\Domain\Document\DocumentStatus;
use PHPUnit\Framework\TestCase;

class DocumentTest extends TestCase
{
    public function testCanBeCreated(): void
    {
        $document = new Document('1', 'Test Title');
        
        $this->assertEquals('1', $document->getId());
        $this->assertEquals('Test Title', $document->getTitle());
        $this->assertEquals(DocumentStatus::DRAFT, $document->getStatus());
        $this->assertNotNull($document->getCreatedAt());
        $this->assertNull($document->getPublishedAt());
    }

    public function testCannotPublishWhenStatusIsNotReview(): void
    {
        $this->expectException(\DomainException::class);
        $this->expectExceptionMessage('Document must be in review status to be published.');

        $document = new Document('1', 'Test Title');
        // Default status is draft
        $document->publish();
    }

    public function testCanPublishWhenStatusIsReview(): void
    {
        $document = new Document('1', 'Test Title');
        $document->submitForReview();

        $document->publish();

        $this->assertEquals(DocumentStatus::PUBLISHED, $document->getStatus());
        $this->assertNotNull($document->getPublishedAt());
    }
}
