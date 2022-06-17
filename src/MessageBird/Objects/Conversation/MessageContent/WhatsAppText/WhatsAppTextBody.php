<?php

namespace MessageBird\Objects\Conversation\MessageContent\WhatsAppText;

use JsonSerializable;
use MessageBird\Objects\Base;

class WhatsAppTextBody extends Base implements JsonSerializable
{

    /**
     * Message body
     *
     * @var string $body
     */
    public $body;


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
