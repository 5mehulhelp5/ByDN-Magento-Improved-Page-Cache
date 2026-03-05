<?php

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