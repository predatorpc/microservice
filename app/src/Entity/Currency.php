<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Currency
 *
 * @ORM\Table(name="Currency")
 * @ORM\Entity
 */
class Currency
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
     * @ORM\Column(name="isoCode", type="text", length=65535, nullable=false)
     */
    private $isocode;

    /**
     * @var string
     *
     * @ORM\Column(name="isoNumberCode", type="text", length=65535, nullable=false)
     */
    private $isonumbercode;

    /**
     * @var string
     *
     * @ORM\Column(name="symbol", type="text", length=65535, nullable=false)
     */
    private $symbol;

    /**
     * @var int
     *
     * @ORM\Column(name="decimals", type="integer", nullable=false)
     */
    private $decimals;

    /**
     * @var string
     *
     * @ORM\Column(name="thousandSeparator", type="text", length=65535, nullable=false)
     */
    private $thousandseparator;

    /**
     * @var string
     *
     * @ORM\Column(name="decimalSeparator", type="text", length=65535, nullable=false)
     */
    private $decimalseparator;

    /**
     * @var bool
     *
     * @ORM\Column(name="isPrefixed", type="boolean", nullable=false)
     */
    private $isprefixed;


    /**
     * @ORM\OneToOne(targetEntity="ProductOption")
     */

    protected $productOption;


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

    public function getIsocode(): ?string
    {
        return $this->isocode;
    }

    public function setIsocode(string $isocode): self
    {
        $this->isocode = $isocode;

        return $this;
    }

    public function getIsonumbercode(): ?string
    {
        return $this->isonumbercode;
    }

    public function setIsonumbercode(string $isonumbercode): self
    {
        $this->isonumbercode = $isonumbercode;

        return $this;
    }

    public function getSymbol(): ?string
    {
        return $this->symbol;
    }

    public function setSymbol(string $symbol): self
    {
        $this->symbol = $symbol;

        return $this;
    }

    public function getDecimals(): ?int
    {
        return $this->decimals;
    }

    public function setDecimals(int $decimals): self
    {
        $this->decimals = $decimals;

        return $this;
    }

    public function getThousandseparator(): ?string
    {
        return $this->thousandseparator;
    }

    public function setThousandseparator(string $thousandseparator): self
    {
        $this->thousandseparator = $thousandseparator;

        return $this;
    }

    public function getDecimalseparator(): ?string
    {
        return $this->decimalseparator;
    }

    public function setDecimalseparator(string $decimalseparator): self
    {
        $this->decimalseparator = $decimalseparator;

        return $this;
    }

    public function getIsprefixed(): ?bool
    {
        return $this->isprefixed;
    }

    public function setIsprefixed(bool $isprefixed): self
    {
        $this->isprefixed = $isprefixed;

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


}
