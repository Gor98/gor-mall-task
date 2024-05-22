<?php


namespace App\Modules\Product\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class CategoryResource
 * @package App\Modules\Auth\Resources
 */
class CategoryResource extends JsonResource
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
        ];
    }
}
