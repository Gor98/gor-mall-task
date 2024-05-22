<?php


namespace App\Modules\Product\Controllers;

use App\Common\Bases\Controller;
use App\Common\Exceptions\RepositoryException;
use App\Common\Tools\APIResponse;
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

}
