<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Productoptionattributevalue
 *
 * @ORM\Table(name="ProductOptionAttributeValue")
 * @ORM\Entity
 */
class Productoptionattributevalue
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
     * @var int
     *
     * @ORM\Column(name="baseAttributeId", type="integer", nullable=false)
     */
    private $baseattributeid;

    /**
     * @var int
     *
     * @ORM\Column(name="baseAttributeValueId", type="integer", nullable=false)
     */
    private $baseattributevalueid;

    /**
     * @var int
     *
     * @ORM\Column(name="baseProductOptionId", type="integer", nullable=false)
     */
    private $baseproductoptionid;


    //////////////////////////////////////////

    /**
     * @ORM\ManyToOne(targetEntity="BaseProductOption", inversedBy="Productoptionattributevalue")
     * @ORM\JoinColumn(nullable=true)
     */

    private $baseProductOption;


    /**
     * @ORM\OneToOne(targetEntity="BaseAttribute")
     */

    protected $baseAttribute;

    /**
     * @ORM\OneToOne(targetEntity="BaseAttributeValue")
     */

    protected $baseAttributeValue;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getBaseattributevalueid(): ?int
    {
        return $this->baseattributevalueid;
    }

    public function setBaseattributevalueid(int $baseattributevalueid): self
    {
        $this->baseattributevalueid = $baseattributevalueid;

        return $this;
    }

    public function getBaseproductoptionid(): ?int
    {
        return $this->baseproductoptionid;
    }

    public function setBaseproductoptionid(int $baseproductoptionid): self
    {
        $this->baseproductoptionid = $baseproductoptionid;

        return $this;
    }

    public function getBaseProductOption(): ?BaseProductOption
    {
        return $this->baseProductOption;
    }

    public function setBaseProductOption(?BaseProductOption $baseProductOption): self
    {
        $this->baseProductOption = $baseProductOption;

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

    public function getBaseAttributeValue(): ?BaseAttributeValue
    {
        return $this->baseAttributeValue;
    }

    public function setBaseAttributeValue(?BaseAttributeValue $baseAttributeValue): self
    {
        $this->baseAttributeValue = $baseAttributeValue;

        return $this;
    }


}
