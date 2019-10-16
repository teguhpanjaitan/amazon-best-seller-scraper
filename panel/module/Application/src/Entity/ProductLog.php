<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductLog
 *
 * @ORM\Table(name="product_log", indexes={@ORM\Index(name="product_id", columns={"product_id"})})
 * @ORM\Entity
 */
class ProductLog
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var float|null
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=true)
     */
    private $price;

    /**
     * @var int|null
     *
     * @ORM\Column(name="best_seller_rank", type="integer", nullable=true)
     */
    private $bestSellerRank;

    /**
     * @var float|null
     *
     * @ORM\Column(name="ratings", type="float", precision=10, scale=0, nullable=true)
     */
    private $ratings;

    /**
     * @var float|null
     *
     * @ORM\Column(name="avg_rating", type="float", precision=10, scale=0, nullable=true)
     */
    private $avgRating;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_on", type="date", nullable=true)
     */
    private $createdOn;

    /**
     * @var \Application\Entity\Product
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     * })
     */
    private $product;



    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set price.
     *
     * @param float|null $price
     *
     * @return ProductLog
     */
    public function setPrice($price = null)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price.
     *
     * @return float|null
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set bestSellerRank.
     *
     * @param int|null $bestSellerRank
     *
     * @return ProductLog
     */
    public function setBestSellerRank($bestSellerRank = null)
    {
        $this->bestSellerRank = $bestSellerRank;

        return $this;
    }

    /**
     * Get bestSellerRank.
     *
     * @return int|null
     */
    public function getBestSellerRank()
    {
        return $this->bestSellerRank;
    }

    /**
     * Set ratings.
     *
     * @param float|null $ratings
     *
     * @return ProductLog
     */
    public function setRatings($ratings = null)
    {
        $this->ratings = $ratings;

        return $this;
    }

    /**
     * Get ratings.
     *
     * @return float|null
     */
    public function getRatings()
    {
        return $this->ratings;
    }

    /**
     * Set avgRating.
     *
     * @param float|null $avgRating
     *
     * @return ProductLog
     */
    public function setAvgRating($avgRating = null)
    {
        $this->avgRating = $avgRating;

        return $this;
    }

    /**
     * Get avgRating.
     *
     * @return float|null
     */
    public function getAvgRating()
    {
        return $this->avgRating;
    }

    /**
     * Set createdOn.
     *
     * @param \DateTime|null $createdOn
     *
     * @return ProductLog
     */
    public function setCreatedOn($createdOn = null)
    {
        $this->createdOn = $createdOn;

        return $this;
    }

    /**
     * Get createdOn.
     *
     * @return \DateTime|null
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * Set product.
     *
     * @param \Application\Entity\Product|null $product
     *
     * @return ProductLog
     */
    public function setProduct(\Application\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product.
     *
     * @return \Application\Entity\Product|null
     */
    public function getProduct()
    {
        return $this->product;
    }
}
