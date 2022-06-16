<?php

namespace MessageBird\Objects\Conversation\WhatsAppInteractive;

use JsonSerializable;
use MessageBird\Objects\Base;
use stdClass;

class MessageContentWhatsAppInteractive extends Base implements JsonSerializable
{

    public const TYPE_LIST = 'list';
    public const TYPE_BUTTON = 'button';
    public const TYPE_PRODUCT = 'product';
    public const TYPE_PRODUCT_LIST = 'product_list';
    public const TYPE_BUTTON_REPLY = 'button_reply';

    /**
     * Interactive message type.
     * Possible values are: 'list', 'button', 'product', 'product_list', 'button_reply'
     *
     * @var string $type
     */
    public string $type;

    /** @var WhatsAppInteractiveHeader $header */
    public WhatsAppInteractiveHeader $header;

    /** @var WhatAppInteractiveBody $body */
    public WhatAppInteractiveBody $body;

    /** @var WhatAppInteractiveAction $action */
    public WhatAppInteractiveAction $action;

    /** @var WhatAppInteractiveFooter $footer */
    public WhatAppInteractiveFooter $footer;

    /** @var WhatAppInteractiveReply $reply */
    public WhatAppInteractiveReply $reply;

    /**
     * @inheritDoc
     * @param $object
     * @return $this
     */
    public function loadFromArray($object): self
    {
        parent::loadFromArray($object);

        if (!empty($object->header)){
            $header = new WhatsAppInteractiveHeader();
            $header->loadFromArray($object->header);
            $this->header = $header;
        }

        if (!empty($object->body)){
            $body = new WhatAppInteractiveBody();
            $body->loadFromArray($object->body);
            $this->body = $body;
        }

        if (!empty($object->action)){
            $action = new WhatAppInteractiveAction();
            $action->loadFromArray($object->action);
            $this->action = $action;
        }

        if (!empty($object->footer)){
            $footer = new WhatAppInteractiveFooter();
            $footer->loadFromArray($object->footer);
            $this->footer = $footer;
        }

        if (!empty($object->reply)){
            $reply = new WhatAppInteractiveReply();
            $reply->loadFromArray($object->reply);
            $this->reply = $reply;
        }

        return $this;
    }

    /**
     * @inheritDoc
     * @param stdClass $object
     * @return $this
     */
    public function loadFromStdclass($object): self
    {
        parent::loadFromStdclass($object);

        if (!empty($object->header)){
            $header = new WhatsAppInteractiveHeader();
            $header->loadFromStdclass($object->header);
            $this->header = $header;
        }

        if (!empty($object->body)){
            $body = new WhatAppInteractiveBody();
            $body->loadFromStdclass($object->body);
            $this->body = $body;
        }

        if (!empty($object->action)){
            $action = new WhatAppInteractiveAction();
            $action->loadFromStdclass($object->action);
            $this->action = $action;
        }

        if (!empty($object->footer)){
            $footer = new WhatAppInteractiveFooter();
            $footer->loadFromStdclass($object->footer);
            $this->footer = $footer;
        }

        if (!empty($object->reply)){
            $reply = new WhatAppInteractiveReply();
            $reply->loadFromStdclass($object->reply);
            $this->reply = $reply;
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
