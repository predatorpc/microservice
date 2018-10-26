<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="Category")
 * @ORM\Entity
 */
class Category
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
     * @var string
     *
     * @ORM\Column(name="name", type="text", length=65535, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

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
     * @ORM\ManyToOne(targetEntity="BaseCategory", inversedBy="category")
     */

    protected $baseCategory;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getBaseCategory(): ?BaseCategory
    {
        return $this->baseCategory;
    }

    public function setBaseCategory(?BaseCategory $baseCategory): self
    {
        $this->baseCategory = $baseCategory;

        return $this;
    }


}
