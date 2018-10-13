<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'provider_id'=>'required',
            'tipofacturta'=>'required|max:20',
            'numerofactura'=>'required|max:10',
            'article_id'=>'required',
            'cantidad'=>'required|max:10',
            'preciocompra'=>'required',
            'precioventa'=>'required'
        ];
    }
}
