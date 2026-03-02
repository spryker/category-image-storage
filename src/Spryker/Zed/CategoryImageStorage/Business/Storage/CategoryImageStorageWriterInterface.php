<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CategoryImageStorage\Business\Storage;

interface CategoryImageStorageWriterInterface
{
    public function publish(array $categoryIds): void;

    public function unpublish(array $categoryIds): void;
}
