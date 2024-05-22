<?php


namespace App\Modules\Product\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateProductRequest
 * @package App\Modules\Product\Requests
 */
class UpdateProductRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'title' => "sometimes|string|max:255",
            'description' => "sometimes|string",
        ];
    }

}
