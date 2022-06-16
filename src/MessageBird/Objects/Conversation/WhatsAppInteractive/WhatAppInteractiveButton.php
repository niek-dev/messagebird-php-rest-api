<?php

namespace MessageBird\Objects\Conversation\WhatsAppInteractive;

use JsonSerializable;
use MessageBird\Objects\Base;


class WhatAppInteractiveButton extends Base implements JsonSerializable
{

    /** @var string $id */
    public string $id;
    /** @var string $type */
    public string $type;
    /** @var string $title */
    public string $title;
    /** @var string $image_url */
    public string $image_url;

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
