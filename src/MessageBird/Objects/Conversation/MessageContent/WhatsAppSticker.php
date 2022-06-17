<?php

namespace MessageBird\Objects\Conversation\MessageContent;

use JsonSerializable;
use MessageBird\Objects\Base;

class WhatsAppSticker extends Base implements JsonSerializable
{

    /** @var string $link */
    public $link;

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
