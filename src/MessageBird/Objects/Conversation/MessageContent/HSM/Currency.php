<?php

namespace MessageBird\Objects\Conversation\MessageContent\HSM;

use JsonSerializable;
use MessageBird\Objects\Base;

class Currency extends Base implements JsonSerializable
{
    /**
     * @var string $code
     */
    public $code;

    /**
     * @var int $amount
     */
    public $amount;

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
