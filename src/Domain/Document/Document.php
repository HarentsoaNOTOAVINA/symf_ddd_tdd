<?php

namespace App\Domain\Document;

class Document
{
    private string $id;
    private string $title;
    private DocumentStatus $status;
    private \DateTimeImmutable $createdAt;
    private ?\DateTimeImmutable $publishedAt = null;

    public function __construct(string $id, string $title)
    {
        $this->id = $id;
        $this->title = $title;
        $this->status = DocumentStatus::DRAFT;
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getStatus(): DocumentStatus
    {
        return $this->status;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getPublishedAt(): ?\DateTimeImmutable
    {
        return $this->publishedAt;
    }

    public function submitForReview(): void
    {
        if ($this->status === DocumentStatus::PUBLISHED) {
            throw new \DomainException('Cannot submit a published document for review.');
        }
        $this->status = DocumentStatus::REVIEW;
    }

    public function publish(): void
    {
        if ($this->status !== DocumentStatus::REVIEW) {
            throw new \DomainException('Document must be in review status to be published.');
        }

        $this->status = DocumentStatus::PUBLISHED;
        $this->publishedAt = new \DateTimeImmutable();
    }
}
