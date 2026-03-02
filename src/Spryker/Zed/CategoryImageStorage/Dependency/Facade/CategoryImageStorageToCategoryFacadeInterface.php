<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CategoryImageStorage\Dependency\Facade;

use Generated\Shared\Transfer\CategoryCollectionTransfer;
use Generated\Shared\Transfer\CategoryCriteriaTransfer;

interface CategoryImageStorageToCategoryFacadeInterface
{
    public function getCategoryCollection(CategoryCriteriaTransfer $categoryCriteriaTransfer): CategoryCollectionTransfer;
}
