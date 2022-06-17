<?php

namespace MessageBird\Objects\Conversation\MessageContent;

use JsonSerializable;
use MessageBird\Objects\Base;
use MessageBird\Objects\Conversation\MessageContent\HSM\HSM as HSMMessage;
use MessageBird\Objects\Conversation\MessageContent\WhatsAppInteractive\WhatsAppInteractive;
use MessageBird\Objects\Conversation\MessageContent\WhatsAppOrder\WhatsAppOrder;
use MessageBird\Objects\Conversation\MessageContent\WhatsAppText\WhatsAppText;
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
    public const TYPE_WHATSAPP_ORDER = 'whatsappOrder';
    public const TYPE_WHATSAPP_TEXT = 'whatsappText';

    /**
     * @var Media $audio
     */
    public $audio;

    /**
     * @var Media $file
     */
    public $file;

    /**
     * @var Media $image
     */
    public $image;

    /**
     * @var Media $video
     */
    public $video;

    /**
     * @var Location $location
     */
    public $location;

    /**
     * @var string $text
     */
    public $text;

    /**
     * WhatsApp Template message (Highly Structured Message)	Outbound
     *
     * @var HSMMessage $hsm
     */
    public $hsm;

    /**
     * WhatsApp interactive message.	Outbound
     *
     * @var WhatsAppInteractive $interactive
     */
    public $interactive;

    /**
     * 	WhatsApp sticker message.	Inbound/outbound
     *
     * @var WhatsAppSticker $whatsappSticker
     */
    public $whatsappSticker;

    /**
     * WhatsApp order message.	Inbound
     *
     * @var WhatsAppOrder $whatsappOrder
     */
    public $whatsappOrder;

    /**
     * WhatsApp product question message. Inbound
     *
     * @var WhatsAppText $whatsappText
     */
    public $whatsappText;


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
            $location = new Location();
            $location->loadFromArray($object->location);
            $this->location = $location;
        }

        if (!empty($object->audio)){
            $audio = new Media();
            $audio->loadFromArray($object->audio);
            $this->audio = $audio;
        }

        if (!empty($object->file)){
            $file = new Media();
            $file->loadFromArray($object->file);
            $this->file = $file;
        }

        if (!empty($object->image)){
            $image = new Media();
            $image->loadFromArray($object->image);
            $this->image = $image;
        }

        if (!empty($object->video)){
            $video = new Media();
            $video->loadFromArray($object->video);
            $this->video = $video;
        }

        if (!empty($object->whatsappSticker)){
            $whatsappSticker = new WhatsAppSticker();
            $whatsappSticker->loadFromArray($object->whatsappSticker);
            $this->whatsappSticker = $whatsappSticker;
        }

        if (!empty($object->interactive)){
            $interactive = new WhatsAppInteractive();
            $interactive->loadFromArray($object->interactive);
            $this->interactive = $interactive;
        }

        if (!empty($object->whatsappOrder)) {
            $whatsAppOrder = new WhatsAppOrder();
            $whatsAppOrder->loadFromArray($object->whatsappOrder);
            $this->whatsappOrder = $whatsAppOrder;
        }

        if (!empty($object->whatsappText)) {
            $whatsAppText = new WhatsAppText();
            $whatsAppText->loadFromArray($object->whatsappText);
            $this->whatsappText = $whatsAppText;
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
            $location = new Location();
            $location->loadFromStdclass($object->location);
            $this->location = $location;
        }

        if (!empty($object->audio)){
            $audio = new Media();
            $audio->loadFromStdclass($object->audio);
            $this->audio = $audio;
        }

        if (!empty($object->file)){
            $file = new Media();
            $file->loadFromStdclass($object->file);
            $this->file = $file;
        }

        if (!empty($object->image)){
            $image = new Media();
            $image->loadFromStdclass($object->image);
            $this->image = $image;
        }

        if (!empty($object->video)){
            $video = new Media();
            $video->loadFromStdclass($object->video);
            $this->video = $video;
        }

        if (!empty($object->whatsappSticker)){
            $whatsappSticker = new WhatsAppSticker();
            $whatsappSticker->loadFromStdclass($object->whatsappSticker);
            $this->whatsappSticker = $whatsappSticker;
        }

        if (!empty($object->interactive)){
            $interactive = new WhatsAppInteractive();
            $interactive->loadFromStdclass($object->interactive);
            $this->interactive = $interactive;
        }

        if (!empty($object->whatsappOrder)) {
            $whatsAppOrder = new WhatsAppOrder();
            $whatsAppOrder->loadFromStdclass($object->whatsappOrder);
            $this->whatsappOrder = $whatsAppOrder;
        }

        if (!empty($object->whatsappText)) {
            $whatsAppText = new WhatsAppText();
            $whatsAppText->loadFromStdclass($object->whatsappText);
            $this->whatsappText = $whatsAppText;
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
