<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TopicStoreRequest extends Request
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
            'title' => 'required|max:200',
            'body'  => 'required|max:5000',
        ];
    }
}
