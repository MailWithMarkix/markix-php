<?php

namespace Markix;

class DomainService extends ApiService
{
    /**
     * Creates a new domain object.
     *
     * @param array{name: string} $data
     * @return array{
     *     id: string,
     *     name: string,
     *     dkim_verified: bool,
     *     return_path_verified: bool,
     * }
     */
    public function create(array $data): array
    {
        return $this->client->post('domains', $data);
    }

    /**
     * Returns a list of domains. The domains are returned in sorted order, with
     * the most recently created domain appearing first.
     */
    public function all(): array
    {
        return $this->client->get('domains');
    }

    /**
     * Retrieves the details of an existing domain. Supply the unique domain ID
     * from either a domain creation request or the domain list, and Markix will
     * return the corresponding domain information.
     *
     * @param string $id
     * @return array
     */
    public function retrieve(string $id): array
    {
        return $this->client->get("domains/{$id}");
    }

    /**
     * Deletes a domain.
     *
     * Returns status code 204 and an empty response body if the domain was
     * deleted successfully.
     *
     * @param string $id
     * @return array
     */
    public function delete(string $id): array
    {
        return $this->client->delete("domains/{$id}");
    }

    /**
     * Verifies the DKIM and Return-Path DNS records of a domain.
     *
     * This endpoint is rate limited to 1 request per minute per domain.
     *
     * If one or both records are verified, the respective attributes
     * `dkim_verified` and `return_path_verified` of the returned domain object
     * will have the value `true`.
     *
     * @param string $id
     * @return array
     */
    public function verify(string $id): array
    {
        return $this->client->post("domains/{$id}/verify");
    }
}
