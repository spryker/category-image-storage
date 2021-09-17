<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CategoryImageStorage\Communication\Plugin\Synchronization;

use Generated\Shared\Transfer\SpyCategoryImageStorageEntityTransfer;
use Generated\Shared\Transfer\SynchronizationDataTransfer;
use Spryker\Shared\CategoryImageStorage\CategoryImageStorageConfig;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\SynchronizationExtension\Dependency\Plugin\SynchronizationDataRepositoryPluginInterface;

/**
 * @deprecated Use {@link \Spryker\Zed\CategoryImageStorage\Communication\Plugin\Synchronization\CategoryImageSynchronizationDataBulkPlugin} instead.
 *
 * @method \Spryker\Zed\CategoryImageStorage\Persistence\CategoryImageStorageRepositoryInterface getRepository()
 * @method \Spryker\Zed\CategoryImageStorage\Business\CategoryImageStorageFacadeInterface getFacade()
 * @method \Spryker\Zed\CategoryImageStorage\Communication\CategoryImageStorageCommunicationFactory getFactory()
 * @method \Spryker\Zed\CategoryImageStorage\CategoryImageStorageConfig getConfig()
 */
class CategoryImageSynchronizationDataPlugin extends AbstractPlugin implements SynchronizationDataRepositoryPluginInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return string
     */
    public function getResourceName(): string
    {
        return CategoryImageStorageConfig::CATEGORY_IMAGE_RESOURCE_NAME;
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return bool
     */
    public function hasStore(): bool
    {
        return false;
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param array<int> $ids
     *
     * @return array<\Generated\Shared\Transfer\SynchronizationDataTransfer>
     */
    public function getData(array $ids = []): array
    {
        $synchronizationDataTransfers = [];
        $categoryImageStorageEntityTransfers = $this->getRepository()->getCategoryImageStorageByFkCategoryIn($ids);

        foreach ($categoryImageStorageEntityTransfers as $categoryImageStorageEntityTransfer) {
            $synchronizationDataTransfers[] = $this->createSynchronizationDataTransfer($categoryImageStorageEntityTransfer);
        }

        return $synchronizationDataTransfers;
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return array
     */
    public function getParams(): array
    {
        return [];
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return string
     */
    public function getQueueName(): string
    {
        return CategoryImageStorageConfig::CATEGORY_IMAGE_SYNC_STORAGE_QUEUE;
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return string|null
     */
    public function getSynchronizationQueuePoolName(): ?string
    {
        return $this->getFactory()->getConfig()->getCategoryImageSynchronizationPoolName();
    }

    /**
     * @param \Generated\Shared\Transfer\SpyCategoryImageStorageEntityTransfer $categoryImageStorageEntityTransfer
     *
     * @return \Generated\Shared\Transfer\SynchronizationDataTransfer
     */
    protected function createSynchronizationDataTransfer(
        SpyCategoryImageStorageEntityTransfer $categoryImageStorageEntityTransfer
    ): SynchronizationDataTransfer {
        /** @var string $categoryImageStorageData */
        $categoryImageStorageData = $categoryImageStorageEntityTransfer->getData();

        return (new SynchronizationDataTransfer())
            ->setData($categoryImageStorageData)
            ->setKey($categoryImageStorageEntityTransfer->getKey());
    }
}
