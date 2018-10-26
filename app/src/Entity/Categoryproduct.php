<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Categoryproduct
 *
 * @ORM\Table(name="CategoryProduct")
 * @ORM\Entity
 */
class Categoryproduct
{
    /**
     * @var int
     *
     * @ORM\Column(name="productId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $productid;

    /**
     * @var int
     *
     * @ORM\Column(name="categoryId", type="integer", nullable=false)
     */
    private $categoryid;

    /**
     * @ORM\ManyToMany(targetEntity="BaseCategory", mappedBy="categoryProduct")
     */

    protected $baseCategory;

    /**
     * @ORM\ManyToMany(targetEntity="BaseProduct", mappedBy="baseProduct")
     */

    protected $baseProduct;

    public function __construct()
    {
        $this->baseCategory = new ArrayCollection();
        $this->baseProduct = new ArrayCollection();
    }

    public function getProductid(): ?int
    {
        return $this->productid;
    }

    public function getCategoryid(): ?int
    {
        return $this->categoryid;
    }

    public function setCategoryid(int $categoryid): self
    {
        $this->categoryid = $categoryid;

        return $this;
    }

    /**
     * @return Collection|BaseCategory[]
     */
    public function getBaseCategory(): Collection
    {
        return $this->baseCategory;
    }

    public function addBaseCategory(BaseCategory $baseCategory): self
    {
        if (!$this->baseCategory->contains($baseCategory)) {
            $this->baseCategory[] = $baseCategory;
            $baseCategory->addCategoryProduct($this);
        }

        return $this;
    }

    public function removeBaseCategory(BaseCategory $baseCategory): self
    {
        if ($this->baseCategory->contains($baseCategory)) {
            $this->baseCategory->removeElement($baseCategory);
            $baseCategory->removeCategoryProduct($this);
        }

        return $this;
    }

    /**
     * @return Collection|BaseProduct[]
     */
    public function getBaseProduct(): Collection
    {
        return $this->baseProduct;
    }

    public function addBaseProduct(BaseProduct $baseProduct): self
    {
        if (!$this->baseProduct->contains($baseProduct)) {
            $this->baseProduct[] = $baseProduct;
            $baseProduct->addBaseProduct($this);
        }

        return $this;
    }

    public function removeBaseProduct(BaseProduct $baseProduct): self
    {
        if ($this->baseProduct->contains($baseProduct)) {
            $this->baseProduct->removeElement($baseProduct);
            $baseProduct->removeBaseProduct($this);
        }

        return $this;
    }


}
