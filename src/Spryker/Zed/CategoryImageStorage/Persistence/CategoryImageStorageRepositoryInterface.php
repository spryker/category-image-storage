<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CategoryImageStorage\Persistence;

use Generated\Shared\Transfer\FilterTransfer;

/**
 * @method \Spryker\Zed\CategoryImageStorage\Persistence\CategoryImageStoragePersistenceFactory getFactory()
 */
interface CategoryImageStorageRepositoryInterface
{
    /**
     * @param array $categoryImageSetIds
     *
     * @return \Propel\Runtime\Collection\ObjectCollection<\Propel\Runtime\ActiveRecord\ActiveRecordInterface>
     */
    public function getCategoryIdsByCategoryImageSetIds(array $categoryImageSetIds);

    /**
     * @param array $categoryIds
     *
     * @return array<\Generated\Shared\Transfer\SpyCategoryImageSetEntityTransfer>
     */
    public function getCategoryImageSetsByFkCategoryIn(array $categoryIds): array;

    /**
     * @param array $categoryIds
     *
     * @return array<\Generated\Shared\Transfer\SpyCategoryImageStorageEntityTransfer>
     */
    public function getCategoryImageStorageByFkCategoryIn(array $categoryIds): array;

    /**
     * @param array $categoryImageIds
     *
     * @return \Propel\Runtime\Collection\ObjectCollection<\Propel\Runtime\ActiveRecord\ActiveRecordInterface>
     */
    public function getCategoryIdsByCategoryImageIds(array $categoryImageIds);

    /**
     * @param \Generated\Shared\Transfer\FilterTransfer $filterTransfer
     * @param array<int> $categoryIds
     *
     * @return array<\Generated\Shared\Transfer\SynchronizationDataTransfer>
     */
    public function getSynchronizationDataTransfersByFilterAndCategoryIds(FilterTransfer $filterTransfer, array $categoryIds = []): array;
}
