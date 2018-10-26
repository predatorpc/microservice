<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attribute
 *
 * @ORM\Table(name="Attribute")
 * @ORM\Entity
 */
class Attribute
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
     * @ORM\Column(name="country", type="text", length=65535, nullable=false)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="text", length=65535, nullable=false)
     */
    private $language;

    /**
     * @var int
     *
     * @ORM\Column(name="baseAttributeId", type="integer", nullable=false)
     */
    private $baseattributeid;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="text", length=65535, nullable=false)
     */
    private $name;

    //////////////////////////

    /**
     * @ORM\OneToOne(targetEntity="BaseAttribute")
     */

    protected $baseAttribute;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getBaseattributeid(): ?int
    {
        return $this->baseattributeid;
    }

    public function setBaseattributeid(int $baseattributeid): self
    {
        $this->baseattributeid = $baseattributeid;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBaseAttribute(): ?BaseAttribute
    {
        return $this->baseAttribute;
    }

    public function setBaseAttribute(?BaseAttribute $baseAttribute): self
    {
        $this->baseAttribute = $baseAttribute;

        return $this;
    }


}
