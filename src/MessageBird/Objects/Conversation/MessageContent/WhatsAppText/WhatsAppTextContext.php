<?php

namespace MessageBird\Objects\Conversation\MessageContent\WhatsAppText;

use JsonSerializable;
use MessageBird\Objects\Base;

class WhatsAppTextContext extends Base implements JsonSerializable
{
    /**
     * WhatsApp ID of the sender of the original message.
     *
     * @var string $from
     */
    public $from;

    /**
     * Message ID of original message.
     *
     * @var string $id
     */
    public $id;

    /**
     * Used for enquiries coming from a Product Detail Page, Single Product Messages, and Multi-Product Message.
     *
     * @var WhatsAppReferredProduct $referred_product
     */
    public $referred_product;

    /**
     * @inheritDoc
     * @param $object
     * @return $this
     */
    public function loadFromArray($object): self
    {
        parent::loadFromArray($object);

        if (!empty($object->referred_product)){
            $referredProduct = new WhatsAppReferredProduct();
            $referredProduct->loadFromArray($object->referred_product);
            $this->referred_product = $referredProduct;
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

        if (!empty($object->referred_product)){
            $referredProduct = new WhatsAppReferredProduct();
            $referredProduct->loadFromStdclass($object->referred_product);
            $this->referred_product = $referredProduct;
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
