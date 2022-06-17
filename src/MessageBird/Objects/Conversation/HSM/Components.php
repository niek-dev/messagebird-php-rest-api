<?php

namespace MessageBird\Objects\Conversation\HSM;

use JsonSerializable;
use MessageBird\Objects\Base;

class Components extends Base implements JsonSerializable
{
    public const TYPE_HEADER = "header";
    public const TYPE_BODY = "body";
    public const TYPE_BUTTON = "button";

    public const SUB_TYPE_QUICK_REPLY = "quick_reply";
    public const SUB_TYPE_URL = "url";

    /**
     * Required. Value could be set to header, body or button.
     *
     * @var string $type
     */
    public $type;

    /**
     * Optional. Required when type is set to button. Supported values are: quick_reply and url
     *
     * @var string $sub_type
     */
    public $sub_type;

    /**
     * Optional. Required when type is set to button. You can have up to 3 buttons using index values of 0-2.
     *
     * @var int $index
     */
    public $index;

    /**
     * Required. Parameters to be used in the template message.
     *
     * @var MessageParam[] $parameters
     */
    public $parameters;


    /**
     * @inheritDoc
     * @param $object
     * @return $this
     */
    public function loadFromArray($object): self
    {
        parent::loadFromArray($object);

        if (!empty($object->parameters)) {
            $newParameters = [];

            foreach ($object->parameters as $parameter) {
                $newParameter = new MessageParam();
                $newParameter->loadFromArray($parameter);
                $newParameters[] = $newParameter;
            }

            $this->parameters = $newParameters;
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

        if (!empty($object->parameters)) {
            $newParameters = [];

            foreach ($object->parameters as $parameter) {
                $newParameter = new MessageParam();
                $newParameter->loadFromStdclass($parameter);
                $newParameters[] = $newParameter;
            }

            $this->parameters = $newParameters;
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
