<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Basecategory
 *
 * @ORM\Table(name="BaseCategory")
 * @ORM\Entity
 */
class Basecategory
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
     * @var int
     *
     * @ORM\Column(name="parentId", type="integer", nullable=false)
     */
    private $parentid;

    /**
     * @ORM\ManyToMany(targetEntity="CategoryProduct", mappedBy="product")
     */

    protected $categoryProduct;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="baseCategory")
     */

    protected $baseCategory;

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

    public function getParentid(): ?int
    {
        return $this->parentid;
    }

    public function setParentid(int $parentid): self
    {
        $this->parentid = $parentid;

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
            $categoryProduct->addProduct($this);
        }

        return $this;
    }

    public function removeCategoryProduct(CategoryProduct $categoryProduct): self
    {
        if ($this->categoryProduct->contains($categoryProduct)) {
            $this->categoryProduct->removeElement($categoryProduct);
            $categoryProduct->removeProduct($this);
        }

        return $this;
    }

    public function getBaseCategory(): ?Category
    {
        return $this->baseCategory;
    }

    public function setBaseCategory(?Category $baseCategory): self
    {
        $this->baseCategory = $baseCategory;

        return $this;
    }


}
