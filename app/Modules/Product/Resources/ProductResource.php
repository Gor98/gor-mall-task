<?php


namespace App\Modules\Product\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ProductResource
 * @package App\Modules\Auth\Resources
 */
class ProductResource extends JsonResource
{
    /**
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'SKU' => $this->SKU,
            'create_at' => format($this->created_at),
            'category' => new CategoryResource($this->category),
        ];
    }
}
