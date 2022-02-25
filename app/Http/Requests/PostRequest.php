<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => ['required', 'max:200'],
            'manager' => ['required', 'max:200'],
            'period' => ['required', 'max:100'],
            'concept' => ['required', 'max:200'],
            'ingenuity' => ['required', 'max:400'],
            'url' => ['required', 'starts_with:https://,http://', 'max:400'],
            'image' => [
                'file', // ファイルがアップロードされている
                'image', // 画像ファイルである
                'mimes:jpeg,jpg,png', // 形式はjpegかpng
                'dimensions:min_width=200,min_height=200',
                'max:1024'
            ],
            'image2' => [
                'file', // ファイルがアップロードされている
                'image', // 画像ファイルである
                'mimes:jpeg,jpg,png', // 形式はjpegかpng
                'dimensions:min_width=200,min_height=200',
                'max:1024'
            ],
        ];
    }
}
