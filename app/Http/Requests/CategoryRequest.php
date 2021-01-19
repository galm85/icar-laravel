<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CategoryRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $unique = !empty($request['item_id']) ? ','.$request['item_id'] : "";
        return [
           'title'=>'required',
           'url'=>'required
                  |regex:/^[a-z\d-]+$/
                  |unique:categories,url' . $unique,
            'article'=>'required',
            'image'=>'image'

        ];
    }
}
