<?php

namespace MessageBird\Objects\Conversation;

use JsonSerializable;
use MessageBird\Objects\Base;

class WebhookSettings extends Base implements JsonSerializable
{
    /** @var string */
    public string $expected_http_code;

    /** @var string */
    public string $headers;

    /** @var string */
    public string $username;

    /** @var string */
    public string $password;

    /** @var string */
    public string $query_params;

    /** @var int */
    public int $retry;

    /** @var int */
    public int $timeout;

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
