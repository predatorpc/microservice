<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="Products")
 * @ORM\Entity
 */
class Product
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
     * @ORM\Column(name="baseProductId", type="integer", nullable=false)
     */
    private $baseproductid;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="text", length=65535, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="shortDescription", type="text", length=65535, nullable=false)
     */
    private $shortdescription;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="composition", type="text", length=65535, nullable=false)
     */
    private $composition;

    /**
     * @var string
     *
     * @ORM\Column(name="instruction", type="text", length=65535, nullable=false)
     */
    private $instruction;

    /**
     * @var bool
     *
     * @ORM\Column(name="isActive", type="boolean", nullable=false)
     */
    private $isactive;

    /**
     * @var string
     *
     * @ORM\Column(name="urlCode", type="text", length=65535, nullable=false)
     */
    private $urlcode;

    /**
     * @var string
     *
     * @ORM\Column(name="metaKeywords", type="text", length=65535, nullable=false)
     */
    private $metakeywords;

    /**
     * @var string
     *
     * @ORM\Column(name="metaDescription", type="text", length=65535, nullable=false)
     */
    private $metadescription;


    /**
     * @ORM\ManyToMany(targetEntity="ProductMarker", mappedBy="Product")
     */

    protected $productMarker;

    /**
     * @ORM\OneToOne(targetEntity="BaseProduct")
     */

    protected $baseProduct;

    public function __construct()
    {
        $this->productMarker = new ArrayCollection();
    }

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

    public function getBaseproductid(): ?int
    {
        return $this->baseproductid;
    }

    public function setBaseproductid(int $baseproductid): self
    {
        $this->baseproductid = $baseproductid;

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

    public function getShortdescription(): ?string
    {
        return $this->shortdescription;
    }

    public function setShortdescription(string $shortdescription): self
    {
        $this->shortdescription = $shortdescription;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getComposition(): ?string
    {
        return $this->composition;
    }

    public function setComposition(string $composition): self
    {
        $this->composition = $composition;

        return $this;
    }

    public function getInstruction(): ?string
    {
        return $this->instruction;
    }

    public function setInstruction(string $instruction): self
    {
        $this->instruction = $instruction;

        return $this;
    }

    public function getIsactive(): ?bool
    {
        return $this->isactive;
    }

    public function setIsactive(bool $isactive): self
    {
        $this->isactive = $isactive;

        return $this;
    }

    public function getUrlcode(): ?string
    {
        return $this->urlcode;
    }

    public function setUrlcode(string $urlcode): self
    {
        $this->urlcode = $urlcode;

        return $this;
    }

    public function getMetakeywords(): ?string
    {
        return $this->metakeywords;
    }

    public function setMetakeywords(string $metakeywords): self
    {
        $this->metakeywords = $metakeywords;

        return $this;
    }

    public function getMetadescription(): ?string
    {
        return $this->metadescription;
    }

    public function setMetadescription(string $metadescription): self
    {
        $this->metadescription = $metadescription;

        return $this;
    }

    /**
     * @return Collection|ProductMarker[]
     */
    public function getProductMarker(): Collection
    {
        return $this->productMarker;
    }

    public function addProductMarker(ProductMarker $productMarker): self
    {
        if (!$this->productMarker->contains($productMarker)) {
            $this->productMarker[] = $productMarker;
            $productMarker->addProduct($this);
        }

        return $this;
    }

    public function removeProductMarker(ProductMarker $productMarker): self
    {
        if ($this->productMarker->contains($productMarker)) {
            $this->productMarker->removeElement($productMarker);
            $productMarker->removeProduct($this);
        }

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
