<?php

namespace MessageBird\Objects\Conversation\WhatsAppInteractive;

use JsonSerializable;
use MessageBird\Objects\Base;

class WhatsAppInteractiveMedia extends Base implements JsonSerializable
{
    /** @var string  */
    public string $url;
    /** @var string  */
    public string $caption;

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
