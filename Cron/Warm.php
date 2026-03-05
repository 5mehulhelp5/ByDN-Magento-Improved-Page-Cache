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

namespace Bydn\ImprovedPageCache\Cron;

use Bydn\ImprovedPageCache\Model\Queue\Consumer;

class Warm
{
    /**
     * @var Consumer
     */
    private $consumer;

    /**
     * @param Consumer $consumer
     */
    public function __construct(
        Consumer $consumer
    ) {
        $this->consumer = $consumer;
    }

    /**
     * Execute the cron job
     *
     * @return void
     */
    public function execute()
    {
        $this->consumer->execute();
    }
}