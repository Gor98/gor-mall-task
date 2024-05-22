<?php


namespace App\Modules\Product\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateProductRequest
 * @package App\Modules\Product\Requests
 */
class CreateProductRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'title' => "required|string|max:255",
            'price' => "required|integer",
            'description' => "required|string",
            'category_id' => "required|exists:categories,id",
        ];
    }

}
