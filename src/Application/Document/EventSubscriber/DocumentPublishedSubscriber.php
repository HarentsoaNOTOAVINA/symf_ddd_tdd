<?php

namespace App\Application\Document\EventSubscriber;

use App\Domain\Document\Event\DocumentPublishedEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class DocumentPublishedSubscriber implements EventSubscriberInterface
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            DocumentPublishedEvent::class => 'onDocumentPublished',
        ];
    }

    public function onDocumentPublished(DocumentPublishedEvent $event): void
    {
        $this->logger->info('Document published', [
            'documentId' => $event->getDocumentId(),
        ]);
    }
}
