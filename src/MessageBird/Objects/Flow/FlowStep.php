<?php

namespace MessageBird\Objects\Flow;

use MessageBird\Objects\Base;

class FlowStep extends \MessageBird\Objects\Base
{
    /** @var string $id */
    public $id;

    /** @var string $action */
    public $action;

    /** @var array<FlowStepOptions> $options */
    public $options;

    /**
     * @inheritDoc
     */
    public function loadFromArray($object): \MessageBird\Objects\Base
    {

        if ($object->options) {
            $this->options = (new FlowStepOptions)->loadFromArray($object->options);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function loadFromStdclass($object): Base
    {

        if ($object->options) {
            $this->options = (new FlowStepOptions)->loadFromStdclass($object->options);
        }

        return $this;
    }
}
