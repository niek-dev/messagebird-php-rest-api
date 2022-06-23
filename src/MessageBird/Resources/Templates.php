<?php

namespace MessageBird\Resources;

use MessageBird\Common\HttpClient;
use MessageBird\Objects\BaseList;
use MessageBird\Objects\Templates\Template;

class Templates extends Base
{

    /**
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->object = new Template();
        $this->setResourceName('platforms/whatsapp/templates');
        parent::__construct($httpClient);
    }

    public function create($object, ?array $query = null)
    {
        $body = json_encode($object, \JSON_THROW_ON_ERROR);
        [, , $body] = $this->httpClient->performHttpRequest(
            HttpClient::REQUEST_POST,
            "v2/$this->resourceName",
            $query,
            $body
        );
        return $this->processRequest($body);
    }


    public function getList(?array $parameters = [])
    {
        [$status, , $body] = $this->httpClient->performHttpRequest(
            HttpClient::REQUEST_GET,
            "v3/$this->resourceName",
            $parameters
        );

        if ($status === 200) {
            $body = json_decode($body, null, 512, \JSON_THROW_ON_ERROR);

            $items = $body->items;
            unset($body->items);

            $baseList = new BaseList();
            $baseList->loadFromArray($body);

            $objectName = $this->object;

            $baseList->items = [];

            if ($items === null) {
                return $baseList;
            }

            foreach ($items as $item) {
                /** @psalm-suppress UndefinedClass */
                $object = new $objectName($this->httpClient);

                $message = $object->loadFromArray($item);
                $baseList->items[] = $message;
            }

            return $baseList;
        }

        return $this->processRequest($body);
    }

}
