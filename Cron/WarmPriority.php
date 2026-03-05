<?php

namespace Bydn\ImprovedPageCache\Cron;

use Bydn\ImprovedPageCache\Model\Queue\Consumer;
use Bydn\ImprovedPageCache\Model\WarmItem\Priority;

class WarmPriority
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
     * Execute the cron job for high priority items
     *
     * @return void
     */
    public function execute()
    {
        $this->consumer->execute(Priority::HIGH);
    }
}
