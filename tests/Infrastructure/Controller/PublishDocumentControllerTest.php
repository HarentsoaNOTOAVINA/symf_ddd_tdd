<?php

namespace App\Tests\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PublishDocumentControllerTest extends WebTestCase
{
    public function testPublishDocumentEndpoint(): void
    {
        $client = static::createClient();

        $client->request('POST', '/api/documents/123/publish');

        $this->assertResponseIsSuccessful();
        $this->assertJsonStringEqualsJsonString(
            json_encode(['status' => 'success', 'documentId' => '123']),
            $client->getResponse()->getContent()
        );
    }

    public function testPublishNonExistentDocument(): void
    {
        $client = static::createClient();

        $client->request('POST', '/api/documents/999/publish');

        $this->assertResponseStatusCodeSame(404);
    }
}
