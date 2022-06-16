<?php

namespace MessageBird\Objects\Conversation\WhatsAppInteractive;

use JsonSerializable;
use MessageBird\Objects\Base;
use stdClass;

class WhatsAppInteractiveHeader extends Base implements JsonSerializable
{

    public const TYPE_TEXT = "text";
    public const TYPE_VIDEO = "video";
    public const TYPE_IMAGE = "image";
    public const TYPE_DOCUMENT = "document";

    /**
     * The header type.
     * Possible values are: 'text', 'video', 'image', 'document'
     *
     * @var string
     */
    public string $type;
    /** @var string  */
    public string $text;
    /** @var WhatsAppInteractiveMedia  */
    public WhatsAppInteractiveMedia $video;
    /** @var WhatsAppInteractiveMedia  */
    public WhatsAppInteractiveMedia $image;
    /** @var WhatsAppInteractiveMedia  */
    public WhatsAppInteractiveMedia $document;

    /**
     * @inheritDoc
     * @param $object
     * @return $this
     */
    public function loadFromArray($object): self
    {
        parent::loadFromArray($object);

        if (!empty($object->video)) {
            $video = new WhatsAppInteractiveMedia();
            $video->loadFromArray($object->video);
            $this->video = $video;
        }

        if (!empty($object->image)) {
            $image = new WhatsAppInteractiveMedia();
            $image->loadFromArray($object->image);
            $this->image = $image;
        }

        if (!empty($object->document)) {
            $document = new WhatsAppInteractiveMedia();
            $document->loadFromArray($object->document);
            $this->document = $document;
        }

        return $this;
    }

    /**
     * @inheritDoc
     * @param stdClass $object
     * @return $this
     */
    public function loadFromStdclass($object): self
    {
        parent::loadFromStdclass($object);

        if (!empty($object->video)) {
            $video = new WhatsAppInteractiveMedia();
            $video->loadFromStdclass($object->video);
            $this->video = $video;
        }

        if (!empty($object->image)) {
            $image = new WhatsAppInteractiveMedia();
            $image->loadFromStdclass($object->image);
            $this->image = $image;
        }

        if (!empty($object->document)) {
            $document = new WhatsAppInteractiveMedia();
            $document->loadFromStdclass($object->document);
            $this->document = $document;
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
