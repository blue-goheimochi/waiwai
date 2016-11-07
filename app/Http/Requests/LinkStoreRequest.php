<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LinkStoreRequest extends Request
{
    /**
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
            'link' => 'required|max:2500',
            'body'  => 'required|max:5000',
        ];
    }
}
