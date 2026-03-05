<?php

namespace Bydn\ImprovedPageCache\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Config extends AbstractHelper
{
    public const XML_PATH_GRID_PER_PAGE = 'catalog/frontend/grid_per_page';

    /**
     * Get grid per page configuration
     *
     * @param int|null $storeId
     * @return int
     */
    public function getProductsPerPage($storeId = null)
    {
        $pageSize = (int)$this->scopeConfig->getValue(
            self::XML_PATH_GRID_PER_PAGE,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );

        if (!$pageSize) {
            $pageSize = 12; // Default if not set
        }

        return $pageSize;
    }
}