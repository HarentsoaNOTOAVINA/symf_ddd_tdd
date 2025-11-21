<?php

namespace App\Tests\Application\Document\EventSubscriber;

use App\Application\Document\EventSubscriber\DocumentPublishedSubscriber;
use App\Domain\Document\Event\DocumentPublishedEvent;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class DocumentPublishedSubscriberTest extends TestCase
{
    public function testSubscribesToDocumentPublishedEvent(): void
    {
        $subscribedEvents = DocumentPublishedSubscriber::getSubscribedEvents();

        $this->assertArrayHasKey(DocumentPublishedEvent::class, $subscribedEvents);
        $this->assertEquals('onDocumentPublished', $subscribedEvents[DocumentPublishedEvent::class]);
    }

    public function testLogsDocumentPublished(): void
    {
        $documentId = '123';
        $event = new DocumentPublishedEvent($documentId);

        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects($this->once())
            ->method('info')
            ->with('Document published', ['documentId' => $documentId]);

        $subscriber = new DocumentPublishedSubscriber($logger);
        $subscriber->onDocumentPublished($event);
    }
}
