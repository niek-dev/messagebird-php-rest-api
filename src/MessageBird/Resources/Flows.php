<?php

namespace MessageBird\Resources;

use MessageBird\Common;
use MessageBird\Common\HttpClient;
use MessageBird\Objects\Flow\Flow;

class Flows extends Base
{


    public function __construct(Common\HttpClient $httpClient)
    {
        $this->object = new Flow();
        $this->setResourceName('flows');
        parent::__construct($httpClient);
    }

    /**
     * Create raw. Returns array
     * @param array|string $json
     * @return array
     * @throws \JsonException
     * @throws \MessageBird\Exceptions\AuthenticateException
     * @throws \MessageBird\Exceptions\HttpException
     */
    public function createRaw(array|string $json): array
    {
        [$status, , $body] = $this->httpClient->performHttpRequest(
            Common\HttpClient::REQUEST_POST,
            $this->resourceName,
            null,
            is_array($json) ? json_encode($json, JSON_THROW_ON_ERROR) : $json
        );
        return json_decode($body, true, 1024, \JSON_THROW_ON_ERROR);
    }

    /**
     * Find raw. Returns array
     * @param string $flowId
     * @return array
     * @throws \JsonException
     * @throws \MessageBird\Exceptions\AuthenticateException
     * @throws \MessageBird\Exceptions\HttpException
     */
    public function findRaw(string $flowId): array
    {
        [$status, , $body] = $this->httpClient->performHttpRequest(
            HttpClient::REQUEST_GET,
            "{$this->resourceName}/$flowId"
        );
        return json_decode($body, true, 1024, \JSON_THROW_ON_ERROR);
    }

    /**
     * Get list of flows. Returns raw array.
     * @param array $parameters
     * @return array
     * @throws \JsonException
     * @throws \MessageBird\Exceptions\AuthenticateException
     * @throws \MessageBird\Exceptions\HttpException
     */
    public function getListRaw(array $parameters = []): array
    {
        [$status, , $body] = $this->httpClient->performHttpRequest(
            HttpClient::REQUEST_GET,
            $this->resourceName,
            $parameters
        );

        return json_decode($body, true, 1024, \JSON_THROW_ON_ERROR);
    }
}
