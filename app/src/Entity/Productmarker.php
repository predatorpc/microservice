<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Productmarker
 *
 * @ORM\Table(name="ProductMarker")
 * @ORM\Entity
 */
class Productmarker
{
    /**
     * @var int
     *
     * @ORM\Column(name="markerid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $markerid;

    /**
     * @var int
     *
     * @ORM\Column(name="productid", type="integer", nullable=false)
     */
    private $productid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expiredAt", type="datetime", nullable=false)
     */
    private $expiredat;

    /**
     * @ORM\ManyToMany(targetEntity="Marker", mappedBy="ProductMarker")
     */

    protected $marker;

    /**
     * @ORM\ManyToMany(targetEntity="Product", mappedBy="ProductMarker")
     */

    protected $product;

    public function __construct()
    {
        $this->marker = new ArrayCollection();
        $this->product = new ArrayCollection();
    }


    public function getMarkerid(): ?int
    {
        return $this->markerid;
    }

    public function getProductid(): ?int
    {
        return $this->productid;
    }

    public function setProductid(int $productid): self
    {
        $this->productid = $productid;

        return $this;
    }

    public function getExpiredat(): ?\DateTimeInterface
    {
        return $this->expiredat;
    }

    public function setExpiredat(\DateTimeInterface $expiredat): self
    {
        $this->expiredat = $expiredat;

        return $this;
    }

    /**
     * @return Collection|Marker[]
     */
    public function getMarker(): Collection
    {
        return $this->marker;
    }

    public function addMarker(Marker $marker): self
    {
        if (!$this->marker->contains($marker)) {
            $this->marker[] = $marker;
            $marker->addProductMarker($this);
        }

        return $this;
    }

    public function removeMarker(Marker $marker): self
    {
        if ($this->marker->contains($marker)) {
            $this->marker->removeElement($marker);
            $marker->removeProductMarker($this);
        }

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->product->contains($product)) {
            $this->product[] = $product;
            $product->addProductMarker($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->product->contains($product)) {
            $this->product->removeElement($product);
            $product->removeProductMarker($this);
        }

        return $this;
    }


}
