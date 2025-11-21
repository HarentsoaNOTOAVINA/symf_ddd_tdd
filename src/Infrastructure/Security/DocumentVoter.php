<?php

namespace App\Infrastructure\Security;

use App\Domain\Document\Document;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class DocumentVoter extends Voter
{
    public const PUBLISH = 'publish';

    protected function supports(string $attribute, $subject): bool
    {
        return $attribute === self::PUBLISH
            && $subject instanceof Document;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        // for demo allow all user
        // after we can implement logic when user calss is implemented 
        
        return true;
    }
}
