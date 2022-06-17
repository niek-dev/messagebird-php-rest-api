<?php

namespace MessageBird\Objects\Conversation\MessageContent\WhatsAppText;

use JsonSerializable;
use MessageBird\Objects\Base;

class WhatsAppReferredProduct extends Base implements JsonSerializable
{
    /**
     * ID for the catalog the item belongs to.
     *
     * @var string $catalog_id
     */
    public $catalog_id;

    /**
     * Unique identifier (in the catalog) of the product.
     *
     * @var string $product_retailer_id
     */
    public $product_retailer_id;

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
