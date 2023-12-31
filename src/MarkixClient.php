<?php

namespace Markix;

use Illuminate\Http\Client\PendingRequest;

class MarkixClient
{
    private string $baseUrl = 'https://api.markix.com/';

    protected PendingRequest $client;

    public MessageService $messages;
    public DomainService $domains;

    public function __construct(string $token)
    {
        // Construct and configure the client.
        $this->client = (new PendingRequest)
            ->withUserAgent('Markix PHP Client')
            ->timeout(5)
            ->baseUrl($this->baseUrl)
            ->acceptJson()
            ->asJson()
            ->withToken($token)
            ->throw();

        // Register the services...
        $this->domains = new DomainService($this);
        $this->messages = new MessageService($this);
    }

    public function setBaseUrl(string $baseUrl): void
    {
        $this->client = $this->client->baseUrl($baseUrl);
    }

    public function post(string $endpoint, array $data = []): array
    {
        return $this
            ->client
            ->post($endpoint, $data)
            ->json();
    }

    public function get(string $endpoint): array
    {
        return $this
            ->client
            ->get($endpoint)
            ->json();
    }

    public function delete(string $endpoint): array
    {
        return $this
            ->client
            ->delete($endpoint)
            ->json();
    }
}
