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

namespace Bydn\ImprovedPageCache\Block\Adminhtml\Warm;

use Bydn\ImprovedPageCache\Model\ResourceModel\WarmItem as WarmItemResource;
use Bydn\ImprovedPageCache\Model\Source\WarmItem\Status;
use Magento\Backend\Block\Template;
use Magento\Backend\Block\Template\Context;

class Summary extends Template
{
    /**
     * @var WarmItemResource
     */
    private $warmItemResource;

    /**
     * @var array|null
     */
    private $countsByStatus = null;

    /**
     * @param WarmItemResource $warmItemResource
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        WarmItemResource $warmItemResource,
        Context $context,
        array $data = []
    ) {
        $this->warmItemResource = $warmItemResource;
        parent::__construct($context, $data);
    }

    /**
     * Returns counts grouped by status as [status_value => count]
     *
     * @return array
     */
    private function getCountsByStatus(): array
    {
        if ($this->countsByStatus === null) {
            $connection = $this->warmItemResource->getConnection();
            $select = $connection->select()
                ->from($this->warmItemResource->getMainTable(), ['status', 'total' => new \Zend_Db_Expr('COUNT(*)')])
                ->group('status');

            $rows = $connection->fetchAll($select);

            $this->countsByStatus = [];
            foreach ($rows as $row) {
                $this->countsByStatus[(int)$row['status']] = (int)$row['total'];
            }
        }

        return $this->countsByStatus;
    }

    /**
     * @return int
     */
    public function getNewCount(): int
    {
        return $this->getCountsByStatus()[Status::NEW] ?? 0;
    }

    /**
     * @return int
     */
    public function getProcessingCount(): int
    {
        return $this->getCountsByStatus()[Status::PROCESSING] ?? 0;
    }

    /**
     * @return int
     */
    public function getDoneCount(): int
    {
        return $this->getCountsByStatus()[Status::DONE] ?? 0;
    }

    /**
     * @return int
     */
    public function getErrorCount(): int
    {
        return $this->getCountsByStatus()[Status::ERROR] ?? 0;
    }
}
