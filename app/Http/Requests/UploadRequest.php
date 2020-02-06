<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required',
        ];
        $attachments = count($this->input('attachments'));
        foreach(range(0, $attachments) as $index) {
            $rules['photos.' . $index] = 'file|required|mimes:jpeg,bmp,png,jpg,pdf,zip|max:20000';
        }
        return $rules;
    }
}
