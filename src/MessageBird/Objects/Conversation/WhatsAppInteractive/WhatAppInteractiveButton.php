<?php

namespace MessageBird\Objects\Conversation\WhatsAppInteractive;

use JsonSerializable;
use MessageBird\Objects\Base;


class WhatAppInteractiveButton extends Base implements JsonSerializable
{

    /** @var string $id */
    public $id;
    /** @var string $type */
    public $type;
    /** @var string $title */
    public $title;
    /** @var string $image_url */
    public $image_url;

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
