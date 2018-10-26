<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Baseproduct
 *
 * @ORM\Table(name="BaseProduct")
 * @ORM\Entity
 */
class Baseproduct
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
     * @ORM\OneToOne(targetEntity="Product")
     */

    protected $product;

    /**
     * @ORM\ManyToMany(targetEntity="CategoryProduct", mappedBy="baseProduct")
     */

    protected $categoryProduct;

    public function __construct()
    {
        $this->categoryProduct = new ArrayCollection();
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

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return Collection|CategoryProduct[]
     */
    public function getCategoryProduct(): Collection
    {
        return $this->categoryProduct;
    }

    public function addCategoryProduct(CategoryProduct $categoryProduct): self
    {
        if (!$this->categoryProduct->contains($categoryProduct)) {
            $this->categoryProduct[] = $categoryProduct;
            $categoryProduct->addBaseProduct($this);
        }

        return $this;
    }

    public function removeCategoryProduct(CategoryProduct $categoryProduct): self
    {
        if ($this->categoryProduct->contains($categoryProduct)) {
            $this->categoryProduct->removeElement($categoryProduct);
            $categoryProduct->removeBaseProduct($this);
        }

        return $this;
    }


}
