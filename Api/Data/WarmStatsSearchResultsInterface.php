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

use Magento\Framework\Api\SearchResultsInterface;

interface WarmStatsSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get WarmStats items
     *
     * @return \Bydn\ImprovedPageCache\Api\Data\WarmStatsInterface[]
     */
    public function getItems(): array;

    /**
     * Set WarmStats items
     *
     * @param \Bydn\ImprovedPageCache\Api\Data\WarmStatsInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
