<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMagazineRequest extends FormRequest
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
            //
            'magazine_name'=>'required',
            'pdf_path'=>'required|mimes:pdf',
            'cover_path'=>'required|mimes:png,jpg,jpeg|max:10000'
        ];
    }
}
