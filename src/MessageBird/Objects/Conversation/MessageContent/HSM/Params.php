<?php

namespace MessageBird\Objects\Conversation\MessageContent\HSM;

use JsonSerializable;
use MessageBird\Objects\Base;

class Params extends Base implements JsonSerializable
{
    /**
     * @var string $default
     */
    public $default;

    /**
     * @var Currency $currency
     */
    public $currency;

    /**
     * Date formatted as RFC3339
     *
     * @var string $dateTime
     */
    public $dateTime;

    /**
     * @inheritDoc
     * @param $object
     * @return $this
     */
    public function loadFromArray($object): self
    {
        parent::loadFromArray($object);

        if (!empty($object->currency)){
            $newCurrency = new Currency();
            $newCurrency->loadFromArray($object->currency);
            $this->currency = $newCurrency;
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

        if (!empty($object->currency)){
            $newCurrency = new Currency();
            $newCurrency->loadFromStdclass($object->currency);
            $this->currency = $newCurrency;
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
