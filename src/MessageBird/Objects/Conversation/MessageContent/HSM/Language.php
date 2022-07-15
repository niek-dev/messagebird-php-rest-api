<?php

namespace MessageBird\Objects\Conversation\MessageContent\HSM;

use JsonSerializable;
use MessageBird\Objects\Base;

class Language extends Base implements JsonSerializable
{
    // Will deliver the message template in the user's device language. If the settings can't be found on the user's
    // device the fallback language is used.
    public const FALLBACK_POLICY = 'fallback';

    // Will deliver the message template exactly in the language and locale asked for.
    public const DETERMINISTIC_POLICY = 'deterministic';

    /**
     * Default value: deterministic. The fallback value was deprecated in January 2020.
     *
     * @var string $policy
     */
    public $policy;

    /**
     * Required. The code of the language or locale to use.
     * It must correspond to one of the languages approved in the WhatsApp template you're using to send a message.
     * Code can be both language and language_locale formats (e.g. en and en_US).
     *
     * @var string $code
     */
    public $code;

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
