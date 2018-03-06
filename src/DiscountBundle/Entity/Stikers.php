<?php

namespace DiscountBundle\Entity;

/**
 * Stikers
 */
class Stikers
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $stikerCategory;

    /**
     * @var string
     */
    private $stikerName;

    /**
     * @var string
     */
    private $stikerDesc;

    /**
     * @var string
     */
    private $stikerKeywords;

    /**
     * @var string
     */
    private $stikerImgname;

    /**
     * @var string
     */
    private $stikerSize;

    /**
     * @var string
     */
    private $stikerPrice;

    /**
     * @var string
     */
    private $linkAlias;

    /**
     * @var boolean
     */
    private $published;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set stikerCategory
     *
     * @param integer $stikerCategory
     *
     * @return Stikers
     */
    public function setStikerCategory($stikerCategory)
    {
        $this->stikerCategory = $stikerCategory;

        return $this;
    }

    /**
     * Get stikerCategory
     *
     * @return integer
     */
    public function getStikerCategory()
    {
        return $this->stikerCategory;
    }

    /**
     * Set stikerName
     *
     * @param string $stikerName
     *
     * @return Stikers
     */
    public function setStikerName($stikerName)
    {
        $this->stikerName = $stikerName;

        return $this;
    }

    /**
     * Get stikerName
     *
     * @return string
     */
    public function getStikerName()
    {
        return $this->stikerName;
    }

    /**
     * Set stikerDesc
     *
     * @param string $stikerDesc
     *
     * @return Stikers
     */
    public function setStikerDesc($stikerDesc)
    {
        $this->stikerDesc = $stikerDesc;

        return $this;
    }

    /**
     * Get stikerDesc
     *
     * @return string
     */
    public function getStikerDesc()
    {
        return $this->stikerDesc;
    }

    /**
     * Set stikerKeywords
     *
     * @param string $stikerKeywords
     *
     * @return Stikers
     */
    public function setStikerKeywords($stikerKeywords)
    {
        $this->stikerKeywords = $stikerKeywords;

        return $this;
    }

    /**
     * Get stikerKeywords
     *
     * @return string
     */
    public function getStikerKeywords()
    {
        return $this->stikerKeywords;
    }

    /**
     * Set stikerImgname
     *
     * @param string $stikerImgname
     *
     * @return Stikers
     */
    public function setStikerImgname($stikerImgname)
    {
        $this->stikerImgname = $stikerImgname;

        return $this;
    }

    /**
     * Get stikerImgname
     *
     * @return string
     */
    public function getStikerImgname()
    {
        return $this->stikerImgname;
    }

    /**
     * Set stikerSize
     *
     * @param string $stikerSize
     *
     * @return Stikers
     */
    public function setStikerSize($stikerSize)
    {
        $this->stikerSize = $stikerSize;

        return $this;
    }

    /**
     * Get stikerSize
     *
     * @return string
     */
    public function getStikerSize()
    {
        return $this->stikerSize;
    }

    /**
     * Set stikerPrice
     *
     * @param string $stikerPrice
     *
     * @return Stikers
     */
    public function setStikerPrice($stikerPrice)
    {
        $this->stikerPrice = $stikerPrice;

        return $this;
    }

    /**
     * Get stikerPrice
     *
     * @return string
     */
    public function getStikerPrice()
    {
        return $this->stikerPrice;
    }

    /**
     * Set linkAlias
     *
     * @param string $linkAlias
     *
     * @return Stikers
     */
    public function setLinkAlias($linkAlias)
    {
        $this->linkAlias = $linkAlias;

        return $this;
    }

    /**
     * Get linkAlias
     *
     * @return string
     */
    public function getLinkAlias()
    {
        return $this->linkAlias;
    }

    /**
     * Set published
     *
     * @param boolean $published
     *
     * @return Stikers
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return boolean
     */
    public function getPublished()
    {
        return $this->published;
    }
}
