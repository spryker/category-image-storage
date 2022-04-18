<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CategoryImageStorage\Communication\Plugin\Event\Listener;

use Spryker\Zed\CategoryImage\Dependency\CategoryImageEvents;
use Spryker\Zed\Event\Dependency\Plugin\EventBulkHandlerInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \Spryker\Zed\CategoryImageStorage\Communication\CategoryImageStorageCommunicationFactory getFactory()
 * @method \Spryker\Zed\CategoryImageStorage\Business\CategoryImageStorageFacadeInterface getFacade()
 * @method \Spryker\Zed\CategoryImageStorage\CategoryImageStorageConfig getConfig()
 */
class CategoryImagePublishStorageListener extends AbstractPlugin implements EventBulkHandlerInterface
{
    /**
     * @api
     *
     * @param array<\Generated\Shared\Transfer\EventEntityTransfer> $eventEntityTransfers
     * @param string $eventName
     *
     * @return void
     */
    public function handleBulk(array $eventEntityTransfers, $eventName)
    {
        $categoryIds = $this->getFactory()->getEventBehaviorFacade()->getEventTransferIds($eventEntityTransfers);

        if ($eventName === CategoryImageEvents::CATEGORY_IMAGE_CATEGORY_PUBLISH) {
            $this->getFacade()->publishCategoryImages($categoryIds);

            return;
        }

        $this->getFacade()->unpublishCategoryImages($categoryIds);
    }
}
