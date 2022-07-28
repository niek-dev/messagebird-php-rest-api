<?php

namespace MessageBird\Objects\Flow;

use MessageBird\Objects\Base;

class FlowStepCase extends \MessageBird\Objects\Base
{

    /** @var array<FlowStepCaseConditions> $conditions */
    public $conditions;

    /** @var array<FlowStep> $steps */
    public $steps;

    /**
     * @inheritDoc
     */
    public function loadFromArray($object): \MessageBird\Objects\Base
    {
        if ($object->conditions) {
            $this->conditions = (new FlowStepCaseConditions)->loadFromArray($object->conditions);
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
        if ($object->conditions) {
            $this->conditions = (new FlowStepCaseConditions)->loadFromStdclass($object->conditions);
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
