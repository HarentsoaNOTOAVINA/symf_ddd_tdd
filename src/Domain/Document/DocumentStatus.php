<?php

namespace App\Domain\Document;

enum DocumentStatus: string
{
    case DRAFT = 'draft';
    case REVIEW = 'review';
    case PUBLISHED = 'published';
}
