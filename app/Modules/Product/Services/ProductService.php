<?php


namespace App\Modules\Product\Services;


use App\Common\Bases\Service;
use App\Common\Exceptions\RepositoryException;
use App\Modules\Product\Repositories\ProductRepository;
use App\Modules\Product\Requests\CreateProductRequest;
use Illuminate\Database\Eloquent\Collection;
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
        return $this->productRepository->create($request->only([
            'title',
            'price',
            'description',
            'category_id',
        ]));
    }

    /**
     * @return Collection
     * @throws RepositoryException
     */
    public function products(): Collection
    {
        return $this->productRepository->all(['category']);
    }

    /**
     * @param $id
     * @param $request
     * @return Model
     * @throws RepositoryException
     */
    public function update($id, $request): Model
    {
        return $this->productRepository->update(
            $request->only(['title', 'description']),
            $id
        );
    }

    /**
     * @param $product
     * @return bool|null
     * @throws \Exception
     */
    public function delete($product): ?bool
    {
        return $this->productRepository->delete($product);
    }
}
