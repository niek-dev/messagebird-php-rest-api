<?php

namespace MessageBird\Objects\Conversation;

use JsonSerializable;
use MessageBird\Objects\Base;
use MessageBird\Objects\Conversation\HSM\Message as HSMMessage;
use MessageBird\Objects\Conversation\WhatsAppInteractive\MessageContentWhatsAppInteractive;
use stdClass;

/**
 * Represents a Message object's actual content. Formatted depending on type.
 */
class MessageContent extends Base implements JsonSerializable
{
    public const TYPE_AUDIO = 'audio';
    public const TYPE_FILE = 'file';
    public const TYPE_IMAGE = 'image';
    public const TYPE_LOCATION = 'location';
    public const TYPE_TEXT = 'text';
    public const TYPE_VIDEO = 'video';
    public const TYPE_HSM = 'hsm';
    public const TYPE_INTERACTIVE = 'interactive';
    public const TYPE_WHATSAPP_STICKER = 'whatsappSticker';

    /**
     * @var MessageContentMedia $audio
     */
    public $audio;

    /**
     * @var MessageContentMedia $file
     */
    public $file;

    /**
     * @var MessageContentMedia $image
     */
    public $image;

    /**
     * @var MessageContentMedia $video
     */
    public $video;

    /**
     * @var MessageContentLocation $location
     */
    public $location;

    /**
     * @var string $text
     */
    public $text;

    /**
     * @var HSMMessage $hsm
     */
    public $hsm;

    /**
     * @var MessageContentWhatsAppInteractive $interactive
     */
    public $interactive;

    /**
     * @var MessageContentWhatsAppSticker $whatsappSticker
     */
    public $whatsappSticker;


    /**
     * @inheritDoc
     * @param $object
     * @return $this
     */
    public function loadFromArray($object): self
    {
        // Text is already properly set if available due to the response's structure.
        parent::loadFromArray($object);

        if (!empty($object->hsm)) {
            $hsm = new HSMMessage();
            $hsm->loadFromArray($object->hsm);
            $this->hsm = $hsm;
        }

        if (!empty($object->location)) {
            $location = new MessageContentLocation();
            $location->loadFromArray($object->location);
            $this->location = $location;
        }

        if (!empty($object->audio)){
            $audio = new MessageContentMedia();
            $audio->loadFromArray($object->audio);
            $this->audio = $audio;
        }

        if (!empty($object->file)){
            $file = new MessageContentMedia();
            $file->loadFromArray($object->file);
            $this->file = $file;
        }

        if (!empty($object->image)){
            $image = new MessageContentMedia();
            $image->loadFromArray($object->image);
            $this->image = $image;
        }

        if (!empty($object->video)){
            $video = new MessageContentMedia();
            $video->loadFromArray($object->video);
            $this->video = $video;
        }

        if (!empty($object->whatsappSticker)){
            $whatsappSticker = new MessageContentWhatsAppSticker();
            $whatsappSticker->loadFromArray($object->whatsappSticker);
            $this->whatsappSticker = $whatsappSticker;
        }

        if (!empty($object->interactive)){
            $interactive = new MessageContentWhatsAppInteractive();
            $interactive->loadFromArray($object->interactive);
            $this->interactive = $interactive;
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
        // Text is already properly set if available due to the response's structure.
        parent::loadFromStdclass($object);

        if (!empty($object->hsm)) {
            $hsm = new HSMMessage();
            $hsm->loadFromStdclass($object->hsm);
            $this->hsm = $hsm;
        }

        if (!empty($object->location)) {
            $location = new MessageContentLocation();
            $location->loadFromStdclass($object->location);
            $this->location = $location;
        }

        if (!empty($object->audio)){
            $audio = new MessageContentMedia();
            $audio->loadFromStdclass($object->audio);
            $this->audio = $audio;
        }

        if (!empty($object->file)){
            $file = new MessageContentMedia();
            $file->loadFromStdclass($object->file);
            $this->file = $file;
        }

        if (!empty($object->image)){
            $image = new MessageContentMedia();
            $image->loadFromStdclass($object->image);
            $this->image = $image;
        }

        if (!empty($object->video)){
            $video = new MessageContentMedia();
            $video->loadFromStdclass($object->video);
            $this->video = $video;
        }

        if (!empty($object->whatsappSticker)){
            $whatsappSticker = new MessageContentWhatsAppSticker();
            $whatsappSticker->loadFromStdclass($object->whatsappSticker);
            $this->whatsappSticker = $whatsappSticker;
        }

        if (!empty($object->interactive)){
            $interactive = new MessageContentWhatsAppInteractive();
            $interactive->loadFromStdclass($object->interactive);
            $this->interactive = $interactive;
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
