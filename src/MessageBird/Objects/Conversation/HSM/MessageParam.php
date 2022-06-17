<?php

namespace MessageBird\Objects\Conversation\HSM;

use JsonSerializable;
use MessageBird\Objects\Base;

class MessageParam extends Base implements JsonSerializable
{

    public const TYPE_IMAGE = "image";
    public const TYPE_DOCUMENT = "document";
    public const TYPE_VIDEO = "video";
    public const TYPE_TEXT = "text";
    public const TYPE_CURRENCY = "currency";
    public const TYPE_DATE_TIME = "date_time";
    public const TYPE_PAYLOAD = "payload";

    /**
     * Required. Defines the parameter type.
     * Possible values are 'image', 'document', 'video', 'text', 'currency', 'date_time', 'payload'
     *
     * @var string $type
     */
    public $type;

    /**
     * Required for type text
     *
     * @var string $text
     */
    public $text;

    /**
     * Required for type payload
     *
     * @var string $payload
     */
    public $payload;

    /**
     * Required for type currency. Defines the currency details.
     *
     * @var Currency $currency
     */
    public $currency;

    /**
     * Required for type date_time Can be present only if currency object is not present. RFC3339 representation of the date and time.
     *
     * @var string $dateTime
     */
    public $dateTime;

    /**
     * Required for type document
     *
     * @var MediaMessageParam $document
     */
    public $document;

    /**
     * Required for type image
     *
     * @var MediaMessageParam $image
     */
    public $image;

    /**
     * Required for type video
     *
     * @var MediaMessageParam $video
     */
    public $video;

    /**
     * @inheritDoc
     * @param $object
     * @return $this
     */
    public function loadFromArray($object): self
    {
        parent::loadFromArray($object);

        if(!empty($object->currency)) {
            $newCurrency = new Currency();
            $newCurrency->loadFromArray($object->currency);
            $this->currency = $newCurrency;
        }

        if(!empty($object->document)) {
            $newDocument = new MediaMessageParam();
            $newDocument->loadFromArray($object->document);
            $this->document = $newDocument;
        }

        if(!empty($object->image)) {
            $image = new MediaMessageParam();
            $image->loadFromArray($object->image);
            $this->image = $image;
        }

        if(!empty($object->video)) {
            $video = new MediaMessageParam();
            $video->loadFromArray($object->video);
            $this->video = $video;
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

        if(!empty($object->currency)) {
            $newCurrency = new Currency();
            $newCurrency->loadFromStdclass($object->currency);
            $this->currency = $newCurrency;
        }

        if(!empty($object->document)) {
            $newDocument = new MediaMessageParam();
            $newDocument->loadFromStdclass($object->document);
            $this->document = $newDocument;
        }

        if(!empty($object->image)) {
            $image = new MediaMessageParam();
            $image->loadFromStdclass($object->image);
            $this->image = $image;
        }

        if(!empty($object->video)) {
            $video = new MediaMessageParam();
            $video->loadFromStdclass($object->video);
            $this->video = $video;
        }

        return $this;
    }

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
