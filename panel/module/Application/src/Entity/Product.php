<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
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
     * @var string|null
     *
     * @ORM\Column(name="link", type="text", length=65535, nullable=true)
     */
    private $link;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ASIN", type="string", length=20, nullable=true)
     */
    private $asin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="text", length=65535, nullable=true)
     */
    private $title;

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
     * @var int|null
     *
     * @ORM\Column(name="ratings", type="integer", nullable=true)
     */
    private $ratings;

    /**
     * @var float|null
     *
     * @ORM\Column(name="avg_rating", type="float", precision=10, scale=0, nullable=true)
     */
    private $avgRating;

    /**
     * @var int|null
     *
     * @ORM\Column(name="status", type="integer", nullable=true, options={"default"="1"})
     */
    private $status = '1';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_on", type="datetime", nullable=true)
     */
    private $createdOn;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_on", type="datetime", nullable=true)
     */
    private $updatedOn;



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
     * Set link.
     *
     * @param string|null $link
     *
     * @return Product
     */
    public function setLink($link = null)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link.
     *
     * @return string|null
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set asin.
     *
     * @param string|null $asin
     *
     * @return Product
     */
    public function setAsin($asin = null)
    {
        $this->asin = $asin;

        return $this;
    }

    /**
     * Get asin.
     *
     * @return string|null
     */
    public function getAsin()
    {
        return $this->asin;
    }

    /**
     * Set title.
     *
     * @param string|null $title
     *
     * @return Product
     */
    public function setTitle($title = null)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set price.
     *
     * @param float|null $price
     *
     * @return Product
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
     * @return Product
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
     * @param int|null $ratings
     *
     * @return Product
     */
    public function setRatings($ratings = null)
    {
        $this->ratings = $ratings;

        return $this;
    }

    /**
     * Get ratings.
     *
     * @return int|null
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
     * @return Product
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
     * Set status.
     *
     * @param int|null $status
     *
     * @return Product
     */
    public function setStatus($status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return int|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createdOn.
     *
     * @param \DateTime|null $createdOn
     *
     * @return Product
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
     * Set updatedOn.
     *
     * @param \DateTime|null $updatedOn
     *
     * @return Product
     */
    public function setUpdatedOn($updatedOn = null)
    {
        $this->updatedOn = $updatedOn;

        return $this;
    }

    /**
     * Get updatedOn.
     *
     * @return \DateTime|null
     */
    public function getUpdatedOn()
    {
        return $this->updatedOn;
    }
}
