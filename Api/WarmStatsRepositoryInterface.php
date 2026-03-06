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

namespace Bydn\ImprovedPageCache\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;

interface WarmStatsRepositoryInterface
{
    /**
     * Retrieve entity.
     *
     * @param int $id
     * @return \Bydn\ImprovedPageCache\Api\Data\WarmStatsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($id);

    /**
     * Retrieve WarmStats matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Bydn\ImprovedPageCache\Api\Data\WarmStatsSearchResultsInterface
     * @throws LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Save WarmStats entry
     *
     * @param \Bydn\ImprovedPageCache\Api\Data\WarmStatsInterface $warmStats
     * @return \Bydn\ImprovedPageCache\Api\Data\WarmStatsInterface
     * @throws LocalizedException
     */
    public function save(\Bydn\ImprovedPageCache\Api\Data\WarmStatsInterface $warmStats)
        : \Bydn\ImprovedPageCache\Api\Data\WarmStatsInterface;

    /**
     * Delete WarmStats
     *
     * @param \Bydn\ImprovedPageCache\Api\Data\WarmStatsInterface $warmStats
     * @return bool true on success
     * @throws LocalizedException
     */
    public function delete(\Bydn\ImprovedPageCache\Api\Data\WarmStatsInterface $warmStats);

    /**
     * Delete WarmStats by ID
     *
     * @param int $id
     * @return bool true on success
     * @throws LocalizedException
     */
    public function deleteById($id);
}
