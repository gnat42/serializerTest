<?php

namespace App;

use JMS\Serializer\Annotation as JMS;

class SimpleObject
{
    /**
     * @var int
     * @JMS\SerializedName("Identity")
     */
    private $id = 1;

    /**
     * @var string
     * @JMS\SerializedName("Object Name")
     */
    private $name = 'theName';

    /** @var string|null */
    private $second;

    public function __construct(?string $second)
    {
        $this->second = $second;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @JMS\VirtualProperty()
     * @JMS\SerializedName("2nd")
     */
    public function getSecond(): ?string
    {
        return $this->second;
    }
}
