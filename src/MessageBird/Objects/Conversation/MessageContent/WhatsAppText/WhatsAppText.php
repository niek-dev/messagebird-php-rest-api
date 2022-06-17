<?php

namespace MessageBird\Objects\Conversation\MessageContent\WhatsAppText;

use JsonSerializable;
use MessageBird\Objects\Base;

class WhatsAppText extends Base implements JsonSerializable
{

    /**
     * Text message
     *
     * @var WhatsAppTextBody $text
     */
    public $text;

    /**
     * Message context
     *
     * @var WhatsAppTextContext $context
     */
    public $context;

    /**
     * @inheritDoc
     * @param $object
     * @return $this
     */
    public function loadFromArray($object): self
    {
        parent::loadFromArray($object);

        if (!empty($object->text)) {
            $text = new WhatsAppTextBody();
            $text->loadFromArray($object->text);
            $this->text = $text;
        }

        if (!empty($object->context)) {
            $context = new WhatsAppTextContext();
            $context->loadFromArray($object->context);
            $this->context = $context;
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

        if (!empty($object->text)) {
            $text = new WhatsAppTextBody();
            $text->loadFromStdclass($object->text);
            $this->text = $text;
        }

        if (!empty($object->context)) {
            $context = new WhatsAppTextContext();
            $context->loadFromStdclass($object->context);
            $this->context = $context;
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
