<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Baseproductoption
 *
 * @ORM\Table(name="BaseProductOption")
 * @ORM\Entity
 */
class Baseproductoption
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

    /**
     * @var string
     *
     * @ORM\Column(name="sku", type="text", length=65535, nullable=false)
     */
    private $sku;

    /**
     * @var int
     *
     * @ORM\Column(name="baseProductId", type="integer", nullable=false)
     */
    private $baseproductid;

    /**
     * @ORM\OneToMany(targetEntity="ProductOptionAttributeValue", mappedBy="Baseproductoption")
     */

    protected $baseProductOptionValue;

    /**
     * @ORM\OneToOne(targetEntity="ProductOption")
     */

    protected $productOption;


    /**
     * @ORM\ManyToOne(targetEntity="BaseProduct", inversedBy="Baseproductoption")
     */

    protected $baseProduct;

    public function __construct()
    {
        $this->baseProductOptionValue = new ArrayCollection();
    }

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

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(string $sku): self
    {
        $this->sku = $sku;

        return $this;
    }

    public function getBaseproductid(): ?int
    {
        return $this->baseproductid;
    }

    public function setBaseproductid(int $baseproductid): self
    {
        $this->baseproductid = $baseproductid;

        return $this;
    }

    /**
     * @return Collection|ProductOptionAttributeValue[]
     */
    public function getBaseProductOptionValue(): Collection
    {
        return $this->baseProductOptionValue;
    }

    public function addBaseProductOptionValue(ProductOptionAttributeValue $baseProductOptionValue): self
    {
        if (!$this->baseProductOptionValue->contains($baseProductOptionValue)) {
            $this->baseProductOptionValue[] = $baseProductOptionValue;
            $baseProductOptionValue->setBaseproductoption($this);
        }

        return $this;
    }

    public function removeBaseProductOptionValue(ProductOptionAttributeValue $baseProductOptionValue): self
    {
        if ($this->baseProductOptionValue->contains($baseProductOptionValue)) {
            $this->baseProductOptionValue->removeElement($baseProductOptionValue);
            // set the owning side to null (unless already changed)
            if ($baseProductOptionValue->getBaseproductoption() === $this) {
                $baseProductOptionValue->setBaseproductoption(null);
            }
        }

        return $this;
    }

    public function getProductOption(): ?ProductOption
    {
        return $this->productOption;
    }

    public function setProductOption(?ProductOption $productOption): self
    {
        $this->productOption = $productOption;

        return $this;
    }

    public function getBaseProduct(): ?BaseProduct
    {
        return $this->baseProduct;
    }

    public function setBaseProduct(?BaseProduct $baseProduct): self
    {
        $this->baseProduct = $baseProduct;

        return $this;
    }


}
