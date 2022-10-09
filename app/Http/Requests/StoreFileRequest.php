<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File as FileRules;

class StoreFileRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'file' => [
                'required',
                FileRules::types(['pdf', 'doc', 'jpg', 'jpeg', 'png', 'txt'])
                    ->max((int)ini_get("upload_max_filesize") * 1024),
            ],
        ];
    }

}
