<?php

namespace MessageBird\Objects\Templates;

use MessageBird\Objects\Base;

class HSMComponentButton extends Base
{
    /**
     * Phone call button
     */
    public const TYPE_PHONE_NUMBER = "PHONE_NUMBER";
    /**
     * URL button
     */
    public const TYPE_URL = "URL";
    /**
     * Quick reply button
     */
    public const TYPE_QUICK_REPLY = "QUICK_REPLY";

    /**
     * Button type
     *
     * @var string $type
     */
    public $type;

    /**
     * Text to be displayed on the button. Required when
     *
     * @var string $text
     */
    public $text;

    /**
     * The URL which the user will be redirected when clicking the button.
     * Only for URL buttons.
     *
     * @var string $url
     */
    public $url;

    /**
     * The phone number which will be called when clicking the button.
     * Only for phone number buttons
     *
     * @var string $phone_number
     */
    public $phone_number;

    /**
     * A list of example values that shows the intended use of the button.
     * URL and QUICK_REPLY buttons.
     *
     * @var string[] $example
     */
    public $example;

}
