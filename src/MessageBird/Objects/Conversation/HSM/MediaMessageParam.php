<?php

namespace MessageBird\Objects\Conversation\HSM;

use JsonSerializable;
use MessageBird\Objects\Base;

class MediaMessageParam extends Base implements JsonSerializable
{
    /**
     * The URL of the remote media file.
     *
     * @var string $url
     */
    public $url;

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
