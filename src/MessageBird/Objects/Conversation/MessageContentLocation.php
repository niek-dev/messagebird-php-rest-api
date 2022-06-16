<?php

namespace MessageBird\Objects\Conversation;

use JsonSerializable;
use MessageBird\Objects\Base;

class MessageContentLocation extends Base implements JsonSerializable
{

    /** @var string $latitude */
    public $latitude;

    /** @var string $longitude */
    public $longitude;

    /**
     * @return array
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
