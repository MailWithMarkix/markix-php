<?php

namespace Markix;

class MessageService extends ApiService
{
    /**
     * Send a new transactional message.
     *
     * @param array{
     *     from: array{address: string, name?: string},
     *     to: array{address: string, name?: string}[],
     *     cc?: array{address: string, name?: string}[],
     *     bcc?: array{address: string, name?: string}[],
     *     reply_to?: array{address: string, name?: string}[],
     *     headers?: array<string, string|null>|null,
     *     metadata?: array<string, string|null>|null,
     *     subject: string,
     *     text: string,
     *     html?: string|null,
     *     tags?: (string|null)[],
     *     attachments?: array{content: string, name: string, type: string}[]|null
     * } $data
     *
     * @return array
     */
    public function send(array $data): array
    {
        return $this->client->post('domains', $data);
    }

    /**
     * Returns a list of messages. The domains are returned in sorted order,
     * with the most recently created message appearing first.
     */
    public function all(): array
    {
        return $this->client->get('messages');
    }

    /**
     * Retrieves the details of an existing message. Supply the unique message
     * ID from either a message creation request or the domain list, and Markix
     * will return the corresponding message information.
     *
     * @param string $id
     * @return array
     */
    public function retrieve(string $id): array
    {
        return $this->client->get("message/{$id}");
    }
}
