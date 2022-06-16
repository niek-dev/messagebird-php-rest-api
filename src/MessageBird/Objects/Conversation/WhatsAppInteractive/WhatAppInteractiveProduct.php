<?php

namespace MessageBird\Objects\Conversation\WhatsAppInteractive;

use JsonSerializable;
use MessageBird\Objects\Base;


class WhatAppInteractiveProduct extends Base implements JsonSerializable
{

    /** @var string $product_retailer_id */
    public string $product_retailer_id;

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
