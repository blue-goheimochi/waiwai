<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CommentStoreRequest extends Request
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
            'body'     => 'required|max:5000',
            'topic_id' => 'required',
        ];
    }
}
