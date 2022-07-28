<?php

namespace MessageBird\Objects\Flow;

use MessageBird\Objects\Base;
use MessageBird\Objects\Conversation\MessageContent\MessageContent;

class FlowStepOptions extends \MessageBird\Objects\Base
{
    /** @var array<FlowStepCase> $cases */
    public $cases;

    /** @var array<FlowStep> $steps */
    public $steps;

    /** @var FlowStepCase $defaultCase */
    public $defaultCase;

    /** @var string $intent */
    public $intent;

    /** @var string $type */
    public $type;

    /** @var array $recipients */
    public $recipients;

    /** @var bool $highThroughput */
    public $highThroughput;

    /** @var string $expiryAt */
    public $expiryAt;

    /** @var string $sendType */
    public $sendType;

    /** @var array $variables */
    public $variables;

    /** @var array<MessageContent> $content */
    public $content;

    /**
     * @inheritDoc
     */
    public function loadFromArray($object): \MessageBird\Objects\Base
    {

        if ($object->cases) {
            $cases = [];

            foreach ($object->cases as $case) {
                $cases[] = (new FlowStepCase)->loadFromArray($case);
            }

            $this->cases = $cases;
        }

        if ($object->steps) {
            $steps = [];

            foreach ($object->steps as $step) {
                $steps[] = (new FlowStep)->loadFromArray($step);
            }

            $this->steps = $steps;
        }

        if ($object->defaultCase) {
            $this->defaultCase = (new FlowStepCase)->loadFromArray($object->defaultCase);
        }

        if ($object->content) {
            $this->content = (new FlowStepCase)->loadFromArray($object->content);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function loadFromStdclass($object): Base
    {
        if ($object->cases) {
            $cases = [];

            foreach ($object->cases as $case) {
                $cases[] = (new FlowStepCase)->loadFromStdclass($case);
            }

            $this->cases = $cases;
        }

        if ($object->steps) {
            $steps = [];

            foreach ($object->steps as $step) {
                $steps[] = (new FlowStep)->loadFromStdclass($step);
            }

            $this->steps = $steps;
        }

        if ($object->defaultCase) {
            $this->defaultCase = (new FlowStepCase)->loadFromStdclass($object->defaultCase);
        }

        if ($object->content) {
            $this->content = (new FlowStepCase)->loadFromStdclass($object->content);
        }

        return $this;
    }
}
