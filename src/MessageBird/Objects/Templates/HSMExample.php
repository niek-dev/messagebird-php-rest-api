<?php

namespace MessageBird\Objects\Templates;

use MessageBird\Objects\Base;

class HSMExample extends Base
{
    /**
     * Example values for HEADER type components, TEXT format.
     * Required for TEXT format when variables are used.
     *
     * @var string[] $header_text
     */
    public $header_text;

    /**
     * Example set of values for the body text variables.
     *
     * @var string[] $body_text
     */
    public $body_text;

    /**
     * Example values for IMAGE-VIDEO-DOCUMENT type components.
     * Required for IMAGE-VIDEO-DOCUMENT format.
     *
     * @var string[] $header_url
     */
    public $header_url;

}
