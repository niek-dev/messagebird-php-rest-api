<?php

namespace MessageBird\Objects\Conversation\HSM;

use JsonSerializable;
use MessageBird\Objects\Base;

class Message extends Base implements JsonSerializable
{
    /**
     * Required. WhatsApp namespace for your account. You will receive this value when setting up your WhatsApp account.
     *
     * @var string $namespace
     */
    public $namespace;

    /**
     * Required. Template name.
     *
     * @var string $templateName
     */
    public $templateName;

    /**
     * The message language.
     *
     * @var Language $language
     */
    public $language;

    /**
     * Parameters for regular templates.
     *
     * @var Params[] $params
     */
    public $params;

    /**
     * Parameters for media templates.
     *
     * @var Components[] $components
     */
    public $components;


    /**
     * @inheritDoc
     * @param $object
     * @return $this
     */
    public function loadFromArray($object): self
    {
        parent::loadFromArray($object);

        if (!empty($object->language)) {
            $newLanguage = new Language();
            $newLanguage->loadFromArray($object->language);
            $this->language = $newLanguage;
        }

        if (!empty($object->params)) {
            $newParams = [];

            foreach ($object->params as $param) {
                $newParam = new Params();
                $newParam->loadFromArray($param);
                $newParams[] = $newParam;
            }

            $this->params = $newParams;
        }

        if (!empty($object->components)) {
            $newComponents = [];

            foreach ($object->components as $component) {
                $newComponent = new Components();
                $newComponent->loadFromArray($component);
                $newComponents[] = $component;
            }

            $this->components = $newComponents;
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

        if (!empty($object->language)) {
            $newLanguage = new Language();
            $newLanguage->loadFromStdclass($object->language);
            $this->language = $newLanguage;
        }

        if (!empty($object->params)) {
            $newParams = [];

            foreach ($object->params as $param) {
                $newParam = new Params();
                $newParam->loadFromStdclass($param);
                $newParams[] = $newParam;
            }

            $this->params = $newParams;
        }

        if (!empty($object->components)) {
            $newComponents = [];

            foreach ($object->components as $component) {
                $newComponent = new Components();
                $newComponent->loadFromStdclass($component);
                $newComponents[] = $component;
            }

            $this->components = $newComponents;
        }

        return $this;
    }


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
