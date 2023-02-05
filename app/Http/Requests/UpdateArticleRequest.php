<?php

namespace App\Http\Requests;

use App\Dto\Article\ArticleDto;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateArticleRequest
 * @package App\Http\Requests
 */
class UpdateArticleRequest extends FormRequest
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
            'title' => ['required', 'max:100', 'min:5'],
            'code' => ['required', 'alpha_dash'],
            'preview_text' => ['required', 'max:255'],
            'detail_text' => ['required'],
            'is_published' => ['nullable']
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязятельно для заполнения',
            'alpha_dash' => 'Поле :attribute должно содержать только латинские символы, цифры и символы тире и подчеркивания',
            'max' => 'Значение :attribute превышает размер максимально допустимого - :max',
            'min' => 'Значение :attribute имеет меньший размер, чем минимально допустимое - :min',
        ];
    }

    /**
     * @return ArticleDto
     */
    public function getDto(): ArticleDto
    {
        return new ArticleDto(
            $this->get('title'),
            $this->get('code'),
            $this->get('preview_text'),
            $this->get('detail_text'),
            $this->has('is_published')
        );
    }
}
