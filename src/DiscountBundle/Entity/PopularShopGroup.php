<?php

namespace DiscountBundle\Entity;

/**
 * PopularShopGroup
 */
class PopularShopGroup
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $catId;

    /**
     * @var string
     */
    private $shopId;

    /**
     * @var integer
     */
    private $groupId;

    /**
     * @var integer
     */
    private $sort;


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
     * Set catId
     *
     * @param integer $catId
     *
     * @return PopularShopGroup
     */
    public function setCatId($catId)
    {
        $this->catId = $catId;

        return $this;
    }

    /**
     * Get catId
     *
     * @return integer
     */
    public function getCatId()
    {
        return $this->catId;
    }

    /**
     * Set shopId
     *
     * @param string $shopId
     *
     * @return PopularShopGroup
     */
    public function setShopId($shopId)
    {
        $this->shopId = $shopId;

        return $this;
    }

    /**
     * Get shopId
     *
     * @return string
     */
    public function getShopId()
    {
        return $this->shopId;
    }

    /**
     * Set groupId
     *
     * @param integer $groupId
     *
     * @return PopularShopGroup
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;

        return $this;
    }

    /**
     * Get groupId
     *
     * @return integer
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * Set sort
     *
     * @param integer $sort
     *
     * @return PopularShopGroup
     */
    public function setSort($sort)
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * Get sort
     *
     * @return integer
     */
    public function getSort()
    {
        return $this->sort;
    }
}
