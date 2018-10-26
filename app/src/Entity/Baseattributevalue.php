<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Baseattributevalue
 *
 * @ORM\Table(name="BaseAttributeValue")
 * @ORM\Entity
 */
class Baseattributevalue
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text", length=65535, nullable=false)
     */
    private $value;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }


}
