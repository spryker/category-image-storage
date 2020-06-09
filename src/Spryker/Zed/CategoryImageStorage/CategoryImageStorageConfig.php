<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CategoryImageStorage;

use Spryker\Zed\Kernel\AbstractBundleConfig;

class CategoryImageStorageConfig extends AbstractBundleConfig
{
    /**
     * @api
     *
     * @deprecated Use {@link \Spryker\Zed\CategoryImageStorage\CategoryImageStorageConfig::getCategoryImageSynchronizationPoolName()} instead.
     *
     * @return string|null
     */
    public function getProductImageSynchronizationPoolName(): ?string
    {
        return $this->getCategoryImageSynchronizationPoolName();
    }

    /**
     * @api
     *
     * @return string|null
     */
    public function getCategoryImageSynchronizationPoolName(): ?string
    {
        return null;
    }

    /**
     * @api
     *
     * @return string|null
     */
    public function getEventQueueName(): ?string
    {
        return null;
    }
}
