<?php

namespace MessageBird\Objects\Flow;

use MessageBird\Objects\Base;

class Flow extends Base
{

    /** @var string $id */
    public $id;

    /** @var string $revisionId */
    public $revisionId;

    /** @var string $trigger */
    public $trigger;

    /** @var string $title */
    public $title;

    /** @var array<FlowStep> $steps */
    public $steps;

    /** @var string $published */
    public $published;

    /** @var string $createdAt */
    public $createdAt;

    /** @var string $updatedAt */
    public $updatedAt;

    /** @var int $revisionCount */
    public $revisionCount;

    /** @var array $tags */
    public $tags;

    /** @var int $retentionHours */
    public $retentionHours;

    /** @var FlowOptions $options */
    public $options;

    /**
     * @inheritDoc
     */
    public function loadFromArray($object): Base
    {

        if ($object->options) {
            $this->options = (new FlowOptions)->loadFromArray($object->options);
        }

        if ($object->steps) {
            $steps = [];

            foreach ($object->steps as $step) {
                $steps[] = (new FlowStep)->loadFromArray($step);
            }

            $this->steps = $steps;
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function loadFromStdclass($object): Base
    {
        if ($object->options) {
            $this->options = (new FlowOptions)->loadFromStdclass($object->options);
        }

        if ($object->steps) {
            $steps = [];

            foreach ($object->steps as $step) {
                $steps[] = (new FlowStep)->loadFromStdclass($step);
            }

            $this->steps = $steps;
        }

        return $this;
    }
}
