<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Marker
 *
 * @ORM\Table(name="Marker")
 * @ORM\Entity
 */
class Marker
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
     * @ORM\Column(name="code", type="text", length=65535, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text", length=65535, nullable=false)
     */
    private $value;


    /**
     * @ORM\ManyToMany(targetEntity="ProductMarker", mappedBy="Marker")
     */

    protected $productMarker;

    public function __construct()
    {
        $this->productMarker = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

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
            $productMarker->addMarker($this);
        }

        return $this;
    }

    public function removeProductMarker(ProductMarker $productMarker): self
    {
        if ($this->productMarker->contains($productMarker)) {
            $this->productMarker->removeElement($productMarker);
            $productMarker->removeMarker($this);
        }

        return $this;
    }


}
