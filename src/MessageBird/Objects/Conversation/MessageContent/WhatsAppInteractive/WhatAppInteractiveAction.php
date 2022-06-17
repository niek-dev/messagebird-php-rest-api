<?php

namespace MessageBird\Objects\Conversation\MessageContent\WhatsAppInteractive;

use JsonSerializable;
use MessageBird\Objects\Base;
use stdClass;


class WhatAppInteractiveAction extends Base implements JsonSerializable
{

    /** @var string $catalog_id*/
    public $catalog_id;
    /** @var string $product_retailer_id */
    public $product_retailer_id;
    /** @var WhatAppInteractiveSection[] $sections  */
    public $sections;
    /** @var string $button */
    public $button;
    /** @var WhatAppInteractiveButton[] $buttons  */
    public $buttons;

    /**
     * @inheritDoc
     * @param $object
     * @return $this
     */
    public function loadFromArray($object): self
    {
        parent::loadFromArray($object);

        if (!empty($object->sections)){
            $sections = [];

            foreach ($object->sections as $section) {
                $newSection = new WhatAppInteractiveSection();
                $newSection->loadFromArray($section);
                $sections[] = $newSection;
            }

            $this->sections = $sections;
        }

        if (!empty($object->buttons)){
            $buttons = [];

            foreach ($object->buttons as $button) {
                $newButton = new WhatAppInteractiveButton();
                $newButton->loadFromArray($button);
                $buttons[] = $newButton;
            }

            $this->buttons = $buttons;
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

        if (!empty($object->sections)){
            $sections = [];

            foreach ($object->sections as $section) {
                $newSection = new WhatAppInteractiveSection();
                $newSection->loadFromStdclass($section);
                $sections[] = $newSection;
            }

            $this->sections = $sections;
        }

        if (!empty($object->buttons)){
            $buttons = [];

            foreach ($object->buttons as $button) {
                $newButton = new WhatAppInteractiveButton();
                $newButton->loadFromStdclass($button);
                $buttons[] = $newButton;
            }

            $this->buttons = $buttons;
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
