<?php

namespace MessageBird\Objects\Conversation\MessageContent\WhatsAppOrder;

use JsonSerializable;
use MessageBird\Objects\Base;

class WhatsAppOrderProduct extends Base implements JsonSerializable
{
    /**
     * Unique identifier (in the catalog) of the product.
     *
     * @var string $product_retailer_id
     */
    public $product_retailer_id;

    /**
     * Number of items purchased.
     *
     * @var int $quantity
     */
    public $quantity;

    /**
     * Unitary price of the items.
     *
     * @var string $item_price
     */
    public $item_price;

    /**
     * Currency of the price.
     *
     * @var string $currency
     */
    public $currency;

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
