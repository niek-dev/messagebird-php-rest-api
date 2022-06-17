<?php

namespace MessageBird\Objects\Conversation\MessageContent;

use JsonSerializable;
use MessageBird\Objects\Base;

class Media extends Base implements JsonSerializable
{

    /** @var string $url */
    public $url;

    /** @var string $caption */
    public $caption;

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
