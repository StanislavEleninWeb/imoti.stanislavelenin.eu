<?php

namespace App\Http\Requests\Source;

use Illuminate\Foundation\Http\FormRequest;

class StoreSourceTable extends FormRequest
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
            'title' => 'required|min:2|max:191',
            'base_url' => 'required|url|active_url',
            'class_generate_base_url' => 'required|string|min:2|max:191',
            'class_generate_link_url' => 'required|string|min:2|max:191',
            'class_url_analyze' => 'required|string|min:2|max:191',
            'class_content_analyze' => 'required|string|min:2|max:191'
        ];
    }
}
