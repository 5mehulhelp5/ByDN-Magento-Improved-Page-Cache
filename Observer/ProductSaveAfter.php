<?php
namespace Bydn\ImprovedPageCache\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;
use Bydn\ImprovedPageCache\Model\Queue\Publisher;
use Magento\Framework\App\State;
use Magento\Framework\App\Area;
use Magento\Framework\Exception\LocalizedException;
use Bydn\ImprovedPageCache\Model\Source\WarmItem\Type as WarmTypes;
use Bydn\ImprovedPageCache\Model\Source\WarmItem\Priority as WarmPriority;

class ProductSaveAfter implements ObserverInterface
{
    /**
     * @var State
     */
    protected $state;

    /**
     * @var Publisher
     */
    protected $publisher;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @param LoggerInterface $logger
     * @param Publisher $publisher
     * @param State $state
     */
    public function __construct(
        State $state,
        Publisher $publisher,
        LoggerInterface $logger
    ) {
        $this->state = $state;
        $this->publisher = $publisher;
        $this->logger = $logger;
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        try {
            if ($this->state->getAreaCode() !== Area::AREA_ADMINHTML) {
                return;
            }
        } catch (LocalizedException $e) {
            // Area is not defined (e.g., scripts or crons not emulating it)
            return;
        }

        // Furthermore, if the process is running in CLI (e.g., via command or cron emulating adminhtml), we ignore it
        if (php_sapi_name() === 'cli') {
            return;
        }

        /** @var \Magento\Catalog\Model\Product $product */
        $product = $observer->getEvent()->getProduct();
        if (!$product || !$product->getId()) {
            return;
        }

        $productId = $product->getId();
        //$this->logger->info('[Bydn_ImprovedPageCache] - ProductSaveAfter executed. Enqueueing product ID: ' . $productId);

        try {
            $this->publisher->sendEntitiesToQueue(
                Publisher::ALL,
                WarmTypes::PRODUCTS,
                $productId,
                WarmPriority::HIGHEST
            );
        } catch (\Exception $e) {
            $this->logger->error('[Bydn_ImprovedPageCache] - Error enqueueing product from observer: ' . $e->getMessage());
        }
    }
}
