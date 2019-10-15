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
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sold", type="integer", nullable=true)
     */
    private $sold;

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
     * @var float|null
     *
     * @ORM\Column(name="rating", type="float", precision=10, scale=0, nullable=true)
     */
    private $rating;

    /**
     * @var float|null
     *
     * @ORM\Column(name="avg_rating", type="float", precision=10, scale=0, nullable=true)
     */
    private $avgRating;

    /**
     * @var string|null
     *
     * @ORM\Column(name="category", type="text", length=65535, nullable=true)
     */
    private $category;



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
     * Set sold.
     *
     * @param int|null $sold
     *
     * @return Products
     */
    public function setSold($sold = null)
    {
        $this->sold = $sold;

        return $this;
    }

    /**
     * Get sold.
     *
     * @return int|null
     */
    public function getSold()
    {
        return $this->sold;
    }

    /**
     * Set link.
     *
     * @param string|null $link
     *
     * @return Products
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
     * @return Products
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
     * @return Products
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
     * @return Products
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
     * Set rating.
     *
     * @param float|null $rating
     *
     * @return Products
     */
    public function setRating($rating = null)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating.
     *
     * @return float|null
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set avgRating.
     *
     * @param float|null $avgRating
     *
     * @return Products
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
     * Set category.
     *
     * @param string|null $category
     *
     * @return Products
     */
    public function setCategory($category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category.
     *
     * @return string|null
     */
    public function getCategory()
    {
        return $this->category;
    }
}
