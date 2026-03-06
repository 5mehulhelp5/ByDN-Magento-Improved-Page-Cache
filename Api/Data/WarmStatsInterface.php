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

namespace Bydn\ImprovedPageCache\Api\Data;

interface WarmStatsInterface
{
    public const ID = 'id';
    public const CREATED_AT = 'created_at';
    public const PENDING_ITEMS = 'pending_items';
    public const DONE_ITEMS = 'done_items';
    public const ERROR_ITEMS = 'error_items';

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get created at
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created at
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);

    /**
     * Get pending items
     *
     * @return int|null
     */
    public function getPendingItems();

    /**
     * Set pending items
     *
     * @param int $pendingItems
     * @return $this
     */
    public function setPendingItems($pendingItems);

    /**
     * Get done items
     *
     * @return int|null
     */
    public function getDoneItems();

    /**
     * Set done items
     *
     * @param int $doneItems
     * @return $this
     */
    public function setDoneItems($doneItems);

    /**
     * Get error items
     *
     * @return int|null
     */
    public function getErrorItems();

    /**
     * Set error items
     *
     * @param int $errorItems
     * @return $this
     */
    public function setErrorItems($errorItems);
}
