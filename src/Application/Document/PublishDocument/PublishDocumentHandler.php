<?php

namespace App\Application\Document\PublishDocument;

use App\Domain\Document\DocumentRepository;
use App\Domain\Document\Event\DocumentPublishedEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class PublishDocumentHandler
{

    public function __construct(
        private DocumentRepository $documentRepository,
        private EventDispatcherInterface $eventDispatcher
    ) {
    }

    public function __invoke(PublishDocument $command): void
    {
        $document = $this->documentRepository->find($command->getId());

        if (!$document) {
            throw new \RuntimeException('Document not found');
        }

        $document->publish();

        $this->documentRepository->save($document);

        $this->eventDispatcher->dispatch(new DocumentPublishedEvent($document->getId()));
    }
}
