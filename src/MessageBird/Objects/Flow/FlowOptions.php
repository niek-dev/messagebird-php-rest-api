<?php

namespace MessageBird\Objects\Flow;

class FlowOptions extends \MessageBird\Objects\Base
{

    /** @var array $callbacks */
    public $callbacks;

    /** @var string $invokeUrl */
    public $invokeUrl;

    /** @var array $targets */
    public $targets;

    /** @var array $variables */
    public $variables;

    /** @var array $metadata */
    public $metadata;

}
