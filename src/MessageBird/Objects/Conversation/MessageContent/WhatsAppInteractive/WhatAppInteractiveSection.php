<?php

namespace MessageBird\Objects\Conversation\MessageContent\WhatsAppInteractive;

use JsonSerializable;
use MessageBird\Objects\Base;
use stdClass;


class WhatAppInteractiveSection extends Base implements JsonSerializable
{
    /** @var string $title */
    public $title;
    /** @var WhatAppInteractiveSectionRow[] $rows  */
    public $rows;
    /** @var WhatAppInteractiveProduct[] $product_items */
    public $product_items;

    /**
     * @inheritDoc
     * @param $object
     * @return $this
     */
    public function loadFromArray($object): self
    {
        // Text is already properly set if available due to the response's structure.
        parent::loadFromArray($object);

        if (!empty($object->rows)){
            $rows = [];

            foreach ($object->rows as $row) {
                $newRow = new WhatAppInteractiveSectionRow();
                $newRow->loadFromArray($row);
                $rows[] = $newRow;
            }

            $this->rows = $rows;
        }

        if (!empty($object->product_items)) {
            $product_items = [];

            foreach ($object->product_items as $product_item) {
                $newProductItem = new WhatAppInteractiveProduct();
                $newProductItem->loadFromArray($product_item);
                $product_items[] = $newProductItem;
            }

            $this->product_items = $product_items;
        }

        return $this;
    }

    /**
     * @inheritDoc
     * @param stdClass $object
     * @return Base
     */
    public function loadFromStdclass($object): self
    {
        parent::loadFromStdclass($object);

        if (!empty($object->rows)){
            $rows = [];

            foreach ($object->rows as $row) {
                $newRow = new WhatAppInteractiveSectionRow();
                $newRow->loadFromStdclass($row);
                $rows[] = $newRow;
            }

            $this->rows = $rows;
        }

        if (!empty($object->product_items)) {
            $product_items = [];

            foreach ($object->product_items as $product_item) {
                $newProductItem = new WhatAppInteractiveProduct();
                $newProductItem->loadFromStdclass($product_item);
                $product_items[] = $newProductItem;
            }

            $this->product_items = $product_items;
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
