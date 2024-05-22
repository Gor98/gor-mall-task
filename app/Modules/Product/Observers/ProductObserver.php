<?php

namespace App\Modules\Product\Observers;

use App\Modules\Product\Models\Product;

class ProductObserver
{
    /**
     * @param Product $product
     */
    public function creating(Product $product)
    {
        $product->sku = makeSKU();
    }
}
