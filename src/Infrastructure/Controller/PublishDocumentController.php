<?php

namespace App\Infrastructure\Controller;

use App\Application\Document\PublishDocument\PublishDocument;
use App\Application\Document\PublishDocument\PublishDocumentHandler;
use App\Domain\Document\DocumentRepository;
use App\Infrastructure\Security\DocumentVoter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class PublishDocumentController extends AbstractController
{
    public function __construct(
        private PublishDocumentHandler $handler,
        private DocumentRepository $repository
    ) {
    }

    #[Route('/api/documents/{id}/publish', name: 'api_documents_publish', methods: ['POST'])]
    public function __invoke(string $id): JsonResponse
    {
        $document = $this->repository->find($id);
        if (!$document) {
            return new JsonResponse(['error' => 'Document not found'], Response::HTTP_NOT_FOUND);
        }

        // permission with voter
        if (!$this->isGranted(DocumentVoter::PUBLISH, $document)) {
            throw new AccessDeniedException('You cannot publish this document.');
        }

        $command = new PublishDocument($id);
        ($this->handler)($command);

        return new JsonResponse([
            'status' => 'success',
            'documentId' => $id
        ]);
    }
}
