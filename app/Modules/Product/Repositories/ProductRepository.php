<?php


namespace App\Modules\Product\Repositories;

use App\Common\Bases\Repository;
use App\Modules\Product\Models\Product;

/**
 * Class ProductRepository
 * @package App\Modules\Produt\Repositories
 */
class ProductRepository extends Repository
{
    /**
     * @var array
     */
    protected array $fillable = [
        'title',
        'description',
        'category_id',
        'SKU',
        'price',
    ];

    /**
     * @return string
     */
    protected function model(): string
    {
        return Product::class;
    }
}
