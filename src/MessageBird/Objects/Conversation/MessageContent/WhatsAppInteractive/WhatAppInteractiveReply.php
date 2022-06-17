<?php

namespace MessageBird\Objects\Conversation\MessageContent\WhatsAppInteractive;

use JsonSerializable;
use MessageBird\Objects\Base;


class WhatAppInteractiveReply extends Base implements JsonSerializable
{

    /** @var string $id */
    public $id;
    /** @var string $text */
    public $text;
    /** @var string $description */
    public $description;

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
