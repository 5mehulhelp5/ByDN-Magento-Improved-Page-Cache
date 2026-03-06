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

namespace Bydn\ImprovedPageCache\Model;

use Bydn\ImprovedPageCache\Api\WarmStatsRepositoryInterface;
use Bydn\ImprovedPageCache\Api\Data\WarmStatsInterface;
use Bydn\ImprovedPageCache\Api\Data\WarmStatsInterfaceFactory;
use Bydn\ImprovedPageCache\Api\Data\WarmStatsSearchResultsInterface;
use Bydn\ImprovedPageCache\Api\Data\WarmStatsSearchResultsInterfaceFactory;
use Bydn\ImprovedPageCache\Model\ResourceModel\WarmStats as WarmStatsResource;
use Bydn\ImprovedPageCache\Model\ResourceModel\WarmStats\CollectionFactory as WarmStatsCollectionFactory;
use Psr\Log\LoggerInterface as Logger;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

class WarmStatsRepository implements WarmStatsRepositoryInterface
{
    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @var WarmStatsResource
     */
    private $resource;

    /**
     * @var WarmStatsCollectionFactory
     */
    private $collectionFactory;

    /**
     * @var WarmStatsFactory
     */
    private $warmStatsFactory;

    /**
     * @var WarmStatsSearchResultsInterfaceFactory
     */
    private $searchResultsFactory;

    /**
     * @var Logger
     */
    private $logger;

    /**
     * @param WarmStatsResource $resource
     * @param WarmStatsFactory $warmStatsFactory
     * @param WarmStatsCollectionFactory $collectionFactory
     * @param WarmStatsSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param Logger $logger
     */
    public function __construct(
        WarmStatsResource $resource,
        WarmStatsFactory $warmStatsFactory,
        WarmStatsCollectionFactory $collectionFactory,
        WarmStatsSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor,
        Logger $logger
    ) {
        $this->resource = $resource;
        $this->warmStatsFactory = $warmStatsFactory;
        $this->collectionFactory = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->logger = $logger;
    }

    /**
     * Retrieve entity.
     *
     * @param int $id
     * @return \Bydn\ImprovedPageCache\Api\Data\WarmStatsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($id)
    {
        $entity = $this->warmStatsFactory->create();
        $this->resource->load($entity, $id);
        if (!$entity->getId()) {
            throw new NoSuchEntityException(__('Could not find entity with id "%1"', $id));
        }
        return $entity;
    }

    /**
     * Retrieve WarmStats matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Bydn\ImprovedPageCache\Api\Data\WarmStatsSearchResultsInterface
     * @throws LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * Save WarmStats entry
     *
     * @param \Bydn\ImprovedPageCache\Api\Data\WarmStatsInterface $warmStats
     * @return \Bydn\ImprovedPageCache\Api\Data\WarmStatsInterface
     * @throws LocalizedException
     */
    public function save(WarmStatsInterface $warmStats): WarmStatsInterface
    {
        try {
            $this->resource->save($warmStats);
        } catch (LocalizedException $exception) {
            throw new CouldNotSaveException(
                __('Could not save the warm stats %1', $exception->getMessage()),
                $exception
            );
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the warm stats: %1', $exception->getMessage()),
                $exception
            );
        }
        return $warmStats;
    }

    /**
     * Delete WarmStats
     *
     * @param \Bydn\ImprovedPageCache\Api\Data\WarmStatsInterface $warmStats
     * @return bool true on success
     * @throws LocalizedException
     */
    public function delete(WarmStatsInterface $warmStats)
    {
        try {
            $this->resource->delete($warmStats);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(
                __('Could not delete the warm stats: %1', $exception->getMessage())
            );
        }
        return true;
    }

    /**
     * Delete WarmStats by ID
     *
     * @param int $id
     * @return bool true on success
     * @throws LocalizedException
     */
    public function deleteById($id)
    {
        return $this->delete($this->get($id));
    }
}
