<?php

namespace MessageBird\Objects\Conversation\MessageContent\WhatsAppOrder;

use JsonSerializable;
use MessageBird\Objects\Base;

class WhatsAppOrder extends Base implements JsonSerializable
{
    /**
     * ID of the catalog that contains the products listed under product_items sections.
     *
     * @var string $catalog_id
     */
    public $catalog_id;

    /**
     * Product items
     *
     * @var WhatsAppOrderProduct[] $product_items
     */
    public $product_items;

    /**
     * Text message sent along with the order.
     *
     * @var string $text
     */
    public $text;

    /**
     * @inheritDoc
     * @param $object
     * @return $this
     */
    public function loadFromArray($object): self
    {
        parent::loadFromArray($object);

        if (!empty($object->product_items)){
            $newProductItems = [];

            foreach ($object->product_items as $product_item) {
                $newProductItem = new WhatsAppOrderProduct();
                $newProductItem->loadFromArray($product_item);
                $newProductItems[] = $newProductItem;
            }

            $this->product_items = $newProductItems;
        }

        return $this;
    }

    /**
     * @inheritDoc
     * @param $object
     * @return $this
     */
    public function loadFromStdclass($object): self
    {
        parent::loadFromStdclass($object);

        if (!empty($object->product_items)){
            $newProductItems = [];

            foreach ($object->product_items as $product_item) {
                $newProductItem = new WhatsAppOrderProduct();
                $newProductItem->loadFromStdclass($product_item);
                $newProductItems[] = $newProductItem;
            }

            $this->product_items = $newProductItems;
        }

        return $this;
    }

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
