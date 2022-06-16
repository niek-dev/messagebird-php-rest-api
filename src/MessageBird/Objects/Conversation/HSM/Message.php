<?php

namespace MessageBird\Objects\Conversation\HSM;

use JsonSerializable;
use MessageBird\Objects\Base;

class Message extends Base implements JsonSerializable
{
    /**
     * @var string $namespace
     */
    public string $namespace;

    /**
     * @var string $templateName
     */
    public string $templateName;

    /**
     * @var Language $language
     */
    public Language $language;

    /**
     * @var Params[] $params
     */
    public array $params;


    /**
     * Serialize only non empty fields.
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
