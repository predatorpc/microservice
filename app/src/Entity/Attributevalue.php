<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attributevalue
 *
 * @ORM\Table(name="AttributeValue")
 * @ORM\Entity
 */
class Attributevalue
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
     * @ORM\Column(name="baseAttributeValueId", type="integer", nullable=false)
     */
    private $baseattributevalueid;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text", length=65535, nullable=false)
     */
    private $value;


    /**
     * @ORM\OneToOne(targetEntity="BaseAttributeValue")
     */

    protected $baseAttributeValue;

    /**
     * @ORM\OneToOne(targetEntity="AttributeValue")
     */

    protected $attributeValue;


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

    public function getBaseattributevalueid(): ?int
    {
        return $this->baseattributevalueid;
    }

    public function setBaseattributevalueid(int $baseattributevalueid): self
    {
        $this->baseattributevalueid = $baseattributevalueid;

        return $this;
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

    public function getBaseAttributeValue(): ?BaseAttributeValue
    {
        return $this->baseAttributeValue;
    }

    public function setBaseAttributeValue(?BaseAttributeValue $baseAttributeValue): self
    {
        $this->baseAttributeValue = $baseAttributeValue;

        return $this;
    }

    public function getAttributeValue(): ?AttributeValue
    {
        return $this->attributeValue;
    }

    public function setAttributeValue(?AttributeValue $attributeValue): self
    {
        $this->attributeValue = $attributeValue;

        return $this;
    }


}
