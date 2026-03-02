<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\CategoryImageStorage\Storage;

use Generated\Shared\Transfer\CategoryImageSetCollectionStorageTransfer;

interface CategoryImageStorageReaderInterface
{
    public function findCategoryImageStorage(int $idCategory, string $localeName): ?CategoryImageSetCollectionStorageTransfer;
}
