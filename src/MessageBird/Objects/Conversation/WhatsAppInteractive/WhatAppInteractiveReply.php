<?php

namespace MessageBird\Objects\Conversation\WhatsAppInteractive;

use JsonSerializable;
use MessageBird\Objects\Base;


class WhatAppInteractiveReply extends Base implements JsonSerializable
{

    /** @var string $id */
    public string $id;
    /** @var string $text */
    public string $text;
    /** @var string $description */
    public string $description;

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
