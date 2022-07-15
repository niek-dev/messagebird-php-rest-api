<?php

namespace MessageBird\Objects\Conversation\MessageContent\HSM;

use JsonSerializable;
use MessageBird\Objects\Base;

class Params extends Base implements JsonSerializable
{
    /**
     * Required. Default value of the parameter, it is used when localization fails.
     * The only field needed when specifying parameter value that doesn't require localization.
     *
     * @var string $default
     */
    public $default;

    /**
     * Can be present only if dateTime object is not present.
     * An object of the form {"currencyCode": "required string of ISO 4217 currency code", "amount": "required integer of total amount together with cents as a float, multiplied by 1000"}
     *
     * @var Currency $currency
     */
    public $currency;

    /**
     * Can be present only if currency object is not present.
     * RFC3339 representation of the date and time.
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
