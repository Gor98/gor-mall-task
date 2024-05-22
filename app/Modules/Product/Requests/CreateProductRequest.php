<?php


namespace App\Modules\Product\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LoginRequest
 * @package App\Modules\Auth\Requests
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
            'description' => "required|string",
            'category_id' => "required|exists:categories",
        ];
    }

}
