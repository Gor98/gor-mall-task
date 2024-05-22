<?php


namespace App\Modules\Product\Services;


use App\Common\Bases\Service;
use App\Common\Exceptions\RepositoryException;
use App\Modules\Product\Repositories\ProductRepository;
use App\Modules\Product\Requests\CreateProductRequest;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SleepService
 * @package App\Modules\Auth\Services
 */
class ProductService extends Service
{
    /**
     * @var ProductRepository
     */
    private ProductRepository $productRepository;

    /**
     * SleepService constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    /**
     * @param CreateProductRequest $request
     * @return Model
     * @throws RepositoryException
     */
    public function createProduct(CreateProductRequest $request): Model
    {
        return $this->productRepository->create($request->all());
    }
}
