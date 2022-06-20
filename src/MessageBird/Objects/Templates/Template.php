<?php

namespace MessageBird\Objects\Templates;

use MessageBird\Objects\Base;

class Template extends Base
{

    /**
     * New template. It can't be used yet
     */
    public const STATUS_NEW = "NEW";
    /**
     * Approved template. It can be used to send template messages
     */
    public const STATUS_APPROVED = "APPROVED";
    /**
     * Approval pending. It can't be used yet
     */
    public const STATUS_PENDING = "PENDING";
    /**
     * The template was rejected by Facebook
     */
    public const STATUS_REJECTED = "REJECTED";
    /**
     * The template is pending for deletion
     */
    public const STATUS_PENDING_DELETION = "PENDING_DELETION";
    /**
     * The template is deleted
     */
    public const STATUS_DELETED = "DELETED";

    // Not documented
    public const CATEGORY_AUTO_REPLY = "AUTO_REPLY";
    /**
     * Account updates
     */
    public const CATEGORY_ACCOUNT_UPDATE = "ACCOUNT_UPDATE";
    /**
     * Payment updates
     */
    public const CATEGORY_PAYMENT_UPDATE = "PAYMENT_UPDATE";
    /**
     * Personal finance update
     */
    public const CATEGORY_PERSONAL_FINANCE_UPDATE = "PERSONAL_FINANCE_UPDATE";
    /**
     * Shipping update
     */
    public const CATEGORY_SHIPPING_UPDATE = "SHIPPING_UPDATE";
    /**
     * Reservation updates
     */
    public const CATEGORY_RESERVATION_UPDATE = "RESERVATION_UPDATE";
    /**
     * Issue resolution updates
     */
    public const CATEGORY_ISSUE_RESOLUTION = "ISSUE_RESOLUTION";
    /**
     * Appointment updates
     */
    public const CATEGORY_APPOINTMENT_UPDATE = "APPOINTMENT_UPDATE";
    /**
     * Transportation updates
     */
    public const CATEGORY_TRANSPORTATION_UPDATE = "TRANSPORTATION_UPDATE";
    /**
     * Customer support ticket updates
     */
    public const CATEGORY_TICKET_UPDATE = "TICKET_UPDATE";
    /**
     * Alert updates
     */
    public const CATEGORY_ALERT_UPDATE = "ALERT_UPDATE";

    /**
     * Template unique UUID
     *
     * @var string $id
     */
    public $id;

    /**
     * Template name. Must be less than 100 characters and can contain only letters, numbers and underscore.
     *
     * @var string $name
     */
    public $name;

    /**
     * Template language. For available languages see: https://developers.messagebird.com/api/integrations/#hsmlanguage-object
     *
     * @var string $language
     */
    public $language;

    /**
     * Template status. For available statuses see: https://developers.messagebird.com/api/integrations/#hsmstatus-object
     *
     * @var string $status
     */
    public $status;

    /**
     * List of components
     *
     * @var HSMComponent[] $components
     */
    public $components;

    /**
     * Template category
     *
     * @var string $category
     */
    public $category;

    /**
     * Rejection reason. Available if the template is rejected. For available reasons check: https://developers.messagebird.com/api/integrations/#hsmrejectedreason-object
     * TODO: verify the type for this.
     *
     * @var string $rejectedReason
     */
    public $rejectedReason;

    /**
     * WhatsApp business id (not documented)
     *
     * @var string $wabaId
     */
    public $wabaId;

    /**
     * Namespace (not documented)
     *
     * @var string $namespace
     */
    public $namespace;

    /**
     * Creation timestamp
     *
     * @var string $createdAt
     */
    public $createdAt;

    /**
     * Last updated timestamp
     *
     * @var string $updatedAt
     */
    public $updatedAt;


    /**
     * @inheritDoc
     * @param $object
     * @return $this
     */
    public function loadFromArray($object): self
    {
        parent::loadFromArray($object);

        if (!empty($object->components)) {
            $newComponents = [];

            foreach ($object->components as $component) {
                $newComponent = new HSMComponent();
                $newComponent->loadFromArray($component);
                $newComponents[] = $newComponent;
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

        if (!empty($object->components)) {
            $newComponents = [];

            foreach ($object->components as $component) {
                $newComponent = new HSMComponent();
                $newComponent->loadFromStdclass($component);
                $newComponents[] = $newComponent;
            }

            $this->components = $newComponents;
        }

        return $this;
    }

}
