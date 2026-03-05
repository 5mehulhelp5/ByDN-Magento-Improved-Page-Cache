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

namespace Bydn\ImprovedPageCache\Plugin\Amasty\Shopby\Helper;

class UrlBuilder
{
    /**
     * @var \Bydn\ImprovedPageCache\Model\Queue\Publisher
     */
    private $cacheWarmer;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;

    public function __construct(
        \Bydn\ImprovedPageCache\Model\Queue\Publisher $cacheWarmer,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->cacheWarmer = $cacheWarmer;
        $this->logger = $logger;
    }

    public function afterbuildUrl(\Amasty\Shopby\Helper\UrlBuilder $subject, $result, $filter, $optionValue)
    {
        return $result;
    }
}