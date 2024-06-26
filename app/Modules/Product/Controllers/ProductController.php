<?php


namespace App\Modules\Product\Controllers;

use App\Common\Bases\Controller;
use App\Common\Exceptions\RepositoryException;
use App\Common\Tools\APIResponse;
use App\Modules\Product\Models\Product;
use App\Modules\Product\Requests\CreateProductRequest;
use App\Modules\Product\Requests\UpdateProductRequest;
use App\Modules\Product\Resources\ProductResource;
use App\Modules\Product\Services\ProductService;
use Illuminate\Http\JsonResponse;

/**
 * Class ProductController
 * @package App\Modules\Product\Controllers
 */
class ProductController extends Controller
{
    /**
     * @var ProductService
     */
    private ProductService $productService;

    /**
     * ProfileController constructor.
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * @return JsonResponse
     * @throws RepositoryException
     */
    public function index(): JsonResponse
    {
        $products = $this->productService->products();

        return APIResponse::collectionResponse(ProductResource::collection($products));
    }

    /**
     * @param CreateProductRequest $request
     * @return JsonResponse
     * @throws RepositoryException
     */
    public function store(CreateProductRequest $request): JsonResponse
    {
        $product = $this->productService->createProduct($request);

        return APIResponse::successResponse(new ProductResource($product));
    }

    /**
     * @param Product $product
     * @return JsonResponse
     */
    public function show(Product $product): JsonResponse
    {
        return APIResponse::successResponse(new ProductResource($product));
    }

    /**
     * @param $id
     * @param UpdateProductRequest $request
     * @return JsonResponse
     * @throws RepositoryException
     */
    public function update($id, UpdateProductRequest $request): JsonResponse
    {
        $product = $this->productService->update($id, $request);

        return APIResponse::successResponse(new ProductResource($product));
    }

    /**
     * @param Product $product
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Product $product): JsonResponse
    {
        $this->productService->delete($product);

        return APIResponse::successResponse([]);
    }
}
