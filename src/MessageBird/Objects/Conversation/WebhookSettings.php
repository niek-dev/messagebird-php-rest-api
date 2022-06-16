<?php

namespace MessageBird\Objects\Conversation;

use JsonSerializable;
use MessageBird\Objects\Base;

class WebhookSettings extends Base implements JsonSerializable
{
    /** @var string $expected_http_code */
    public $expected_http_code;

    /** @var string $headers*/
    public $headers;

    /** @var string $username*/
    public $username;

    /** @var string $password*/
    public $password;

    /** @var string $query_params*/
    public $query_params;

    /** @var int $retry*/
    public $retry;

    /** @var int $timeout*/
    public $timeout;

    /**
     * Serialize only non empty fields.
     */
    public function jsonSerialize(): array
    {
        $json = [];

        foreach (get_object_vars($this) as $key => $value) {
            if (!empty($value)) {
                $json[$key] = $value;
            }
        }

        return $json;
    }
}
