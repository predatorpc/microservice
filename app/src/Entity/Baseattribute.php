<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Baseattribute
 *
 * @ORM\Table(name="BaseAttribute")
 * @ORM\Entity
 */
class Baseattribute
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
     * @ORM\Column(name="name", type="text", length=65535, nullable=false)
     */


    private $name;

    ///////////////////////////////////////////////

    /**
     * @ORM\OneToOne(targetEntity="Attribute")
     */

    protected $attribute;


    /**
     * @ORM\OneToOne(targetEntity="ProductOptionAttributeValue")
     */

    protected $productOptionAttributeValue;



    public function getId(): ?int
    {
        return $this->id;
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

    public function getAttribute(): ?Attribute
    {
        return $this->attribute;
    }

    public function setAttribute(?Attribute $attribute): self
    {
        $this->attribute = $attribute;

        return $this;
    }

    public function getProductOptionAttributeValue(): ?ProductOptionAttributeValue
    {
        return $this->productOptionAttributeValue;
    }

    public function setProductOptionAttributeValue(?ProductOptionAttributeValue $productOptionAttributeValue): self
    {
        $this->productOptionAttributeValue = $productOptionAttributeValue;

        return $this;
    }


}
