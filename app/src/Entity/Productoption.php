<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Productoption
 *
 * @ORM\Table(name="ProductOption")
 * @ORM\Entity
 */
class Productoption
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
     * @ORM\Column(name="baseProductOptionId", type="integer", nullable=false)
     */
    private $baseproductoptionid;

    /**
     * @var string
     *
     * @ORM\Column(name="sku", type="text", length=65535, nullable=false)
     */
    private $sku;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="text", length=65535, nullable=false)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="isActive", type="boolean", nullable=false)
     */
    private $isactive;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer", nullable=false)
     */
    private $price;

    /**
     * @var int
     *
     * @ORM\Column(name="oldPrice", type="integer", nullable=false)
     */
    private $oldprice;

    /**
     * @var int
     *
     * @ORM\Column(name="currencyId", type="integer", nullable=false)
     */
    private $currencyid;

    /**
     * @var float
     *
     * @ORM\Column(name="points", type="float", precision=10, scale=0, nullable=false)
     */
    private $points;

    /**
     * @ORM\OneToOne(targetEntity="Currency")
     */

    protected $currency;

    /**
     * @ORM\OneToOne(targetEntity="BaseProductOption")
     */

    protected $baseProductOption;

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

    public function getBaseproductoptionid(): ?int
    {
        return $this->baseproductoptionid;
    }

    public function setBaseproductoptionid(int $baseproductoptionid): self
    {
        $this->baseproductoptionid = $baseproductoptionid;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getOldprice(): ?int
    {
        return $this->oldprice;
    }

    public function setOldprice(int $oldprice): self
    {
        $this->oldprice = $oldprice;

        return $this;
    }

    public function getCurrencyid(): ?int
    {
        return $this->currencyid;
    }

    public function setCurrencyid(int $currencyid): self
    {
        $this->currencyid = $currencyid;

        return $this;
    }

    public function getPoints(): ?float
    {
        return $this->points;
    }

    public function setPoints(float $points): self
    {
        $this->points = $points;

        return $this;
    }

    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    public function setCurrency(?Currency $currency): self
    {
        $this->currency = $currency;

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


}
