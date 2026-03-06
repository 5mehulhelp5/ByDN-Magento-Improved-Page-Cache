<?php
/**
 * @package     Bydn_ImprovedPageCache
 * @author      Daniel Navarro <https://github.com/danidnm>
 * @license     GPL-3.0-or-later
 * @copyright   Copyright (c) 2025 Daniel Navarro
 *
 * This file is part of a free software package licensed under the
 * GNU General Public License v3.0.
 * You may redistribute and/or modify it under the same license.
 */

namespace Bydn\ImprovedPageCache\Model;

use Magento\Framework\Model\AbstractModel;
use Bydn\ImprovedPageCache\Api\Data\WarmStatsInterface;

class WarmStats extends AbstractModel implements WarmStatsInterface
{
    /**
     * Internal constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Bydn\ImprovedPageCache\Model\ResourceModel\WarmStats::class);
        $this->setIdFieldName('id');
    }

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Get created at
     *
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set created at
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * Get pending items
     *
     * @return int|null
     */
    public function getPendingItems()
    {
        return $this->getData(self::PENDING_ITEMS);
    }

    /**
     * Set pending items
     *
     * @param int $pendingItems
     * @return $this
     */
    public function setPendingItems($pendingItems)
    {
        return $this->setData(self::PENDING_ITEMS, $pendingItems);
    }

    /**
     * Get done items
     *
     * @return int|null
     */
    public function getDoneItems()
    {
        return $this->getData(self::DONE_ITEMS);
    }

    /**
     * Set done items
     *
     * @param int $doneItems
     * @return $this
     */
    public function setDoneItems($doneItems)
    {
        return $this->setData(self::DONE_ITEMS, $doneItems);
    }

    /**
     * Get error items
     *
     * @return int|null
     */
    public function getErrorItems()
    {
        return $this->getData(self::ERROR_ITEMS);
    }

    /**
     * Set error items
     *
     * @param int $errorItems
     * @return $this
     */
    public function setErrorItems($errorItems)
    {
        return $this->setData(self::ERROR_ITEMS, $errorItems);
    }
}
