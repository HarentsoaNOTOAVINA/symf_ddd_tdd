<?php

namespace App\Tests\Application\Document\PublishDocument;

use App\Application\Document\PublishDocument\PublishDocument;
use App\Application\Document\PublishDocument\PublishDocumentHandler;
use App\Domain\Document\Document;
use App\Domain\Document\DocumentRepository;
use App\Domain\Document\DocumentStatus;
use App\Domain\Document\Event\DocumentPublishedEvent;
use PHPUnit\Framework\TestCase;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class PublishDocumentHandlerTest extends TestCase
{
    public function testCanPublishDocument(): void
    {
        $documentId = '123';
        $document = new Document($documentId, 'Test Doc');
        $document->submitForReview();

        $repository = $this->createMock(DocumentRepository::class);
        $repository->expects($this->once())
            ->method('find')
            ->with($documentId)
            ->willReturn($document);
        
        $repository->expects($this->once())
            ->method('save')
            ->with($document);

        $eventDispatcher = $this->createMock(EventDispatcherInterface::class);
        $eventDispatcher->expects($this->once())
            ->method('dispatch')
            ->with($this->isInstanceOf(DocumentPublishedEvent::class));

        $handler = new PublishDocumentHandler($repository, $eventDispatcher);
        $command = new PublishDocument($documentId);

        $handler($command);

        $this->assertEquals(DocumentStatus::PUBLISHED, $document->getStatus());
    }

    public function testThrowsExceptionIfDocumentNotFound(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Document not found');

        $repository = $this->createMock(DocumentRepository::class);
        $repository->expects($this->once())
            ->method('find')
            ->willReturn(null);

        $eventDispatcher = $this->createMock(EventDispatcherInterface::class);

        $handler = new PublishDocumentHandler($repository, $eventDispatcher);
        $command = new PublishDocument('999');

        $handler($command);
    }
}
