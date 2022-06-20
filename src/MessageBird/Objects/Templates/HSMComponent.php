<?php

namespace MessageBird\Objects\Templates;

use MessageBird\Objects\Base;

class HSMComponent extends Base
{

    /**
     * Body component
     */
    public const TYPE_BODY = "BODY";
    /**
     * Header component
     */
    public const TYPE_HEADER = "HEADER";
    /**
     * Footer component
     */
    public const TYPE_FOOTER = "FOOTER";
    /**
     * Buttons component
     */
    public const TYPE_BUTTONS = "BUTTONS";

    /**
     * Text component format
     */
    public const FORMAT_TEXT = "TEXT";
    /**
     * Image component format
     */
    public const FORMAT_IMAGE = "IMAGE";
    /**
     * Document component format
     */
    public const FORMAT_DOCUMENT = "DOCUMENT";
    /**
     * Video component format
     */
    public const FORMAT_VIDEO = "VIDEO";

    /**
     * Component type
     *
     * @var string $type
     */
    public $type;

    /**
     * Component format.
     * Only for header components
     *
     * @var string $format
     */
    public $format;

    /**
     * Text of the message to be sent
     * Only for body components
     *
     * @var string $text
     */
    public $text;

    /**
     * List of buttons
     * Only for buttons components
     *
     * @var HSMComponentButton[] $buttons
     */
    public $buttons;

    /**
     * @var HSMExample $example
     */
    public $example;


    /**
     * @inheritDoc
     * @param $object
     * @return $this
     */
    public function loadFromArray($object): self
    {
        parent::loadFromArray($object);

        if (!empty($object->buttons)){
            $newButtons = [];

            foreach ($object->buttons as $button){
                $newButton = new HSMComponentButton();
                $newButton->loadFromArray($button);
                $newButtons[] = $newButton;
            }

            $this->buttons = $newButtons;
        }

        if (!empty($object->example)){
            $newExample = new HSMExample();
            $newExample->loadFromArray($object->example);
            $this->example = $newExample;
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

        if (!empty($object->buttons)){
            $newButtons = [];

            foreach ($object->buttons as $button){
                $newButton = new HSMComponentButton();
                $newButton->loadFromStdclass($button);
                $newButtons[] = $newButton;
            }

            $this->buttons = $newButtons;
        }

        if (!empty($object->example)){
            $newExample = new HSMExample();
            $newExample->loadFromStdclass($object->example);
            $this->example = $newExample;
        }

        return $this;
    }

}
