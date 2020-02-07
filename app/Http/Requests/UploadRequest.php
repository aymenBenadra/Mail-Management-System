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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'ref' => 'required',
            'attachments.*' => 'file|required|mimes:jpeg,bmp,png,jpg,pdf,zip|max:20000'
        ];
        /*$attachments = count($this->input('attachments'));
        foreach(range(0, $attachments) as $index) {
            $rules['attachments.' . $index] = 'file|required|mimes:jpeg,bmp,png,jpg,pdf,zip|max:20000';
        }*/
        return $rules;
    }
}
