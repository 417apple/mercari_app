<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2000'],
            'category'    => ['required', 'integer'],
            'condition'   => ['required', 'integer'],
            'price'       => ['required', 'integer', 'min:100', 'max:9999999'],
            'item-image'  => ['required', 'file', 'image'],
        ];
    }

    public function attributes()
    {
        return [
            'name'        => '商品名',
            'description' => '商品の説明',
            'category'    => 'カテゴリ',
            'condition'   => '商品の状態',
            'price'       => '販売価格',
        ];
    }
}
