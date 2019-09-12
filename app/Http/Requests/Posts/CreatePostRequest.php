<?php

namespace App\Http\Requests\posts;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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


            //'Description'=>'required|unique',
            'contents'=>'required|uniqu e:posts',
            'Descrip'=>'required',
            'ttl'=>'required',
            'img'=>'required|image',
            'category'=>'required'
            //'pba'=>'required',
           // 'published_at'=>'required',
            //'image'=>'required|image'

        ];
    }
}
