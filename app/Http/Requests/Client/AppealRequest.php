<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class AppealRequest extends FormRequest
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
            'theme' => 'required|string|max:255',
            'message' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'file' => 'file|max:16384',
        ];
    }

    /**
     * Receiving messages in case of validation error
     *
     * @return array
     * 
     */
    public function messages()
    {
        return [
            'theme.required' => 'Необходимо заполнить тему',
            'message.required' => 'Необходимо заполнить сообщение',
            'name.required' => 'Необходимо заполнить имя',
            'email.required' => 'Необходимо заполнить email',
            'theme.string' => 'Содержимое должно быть текстом',
            'message.string' => 'Содержимое должно быть текстом',
            'name.string' => 'Содержимое должно быть текстом',
            'email.string' => 'Содержимое должно быть текстом',
            'email.email' => 'Почта должна быть в формате example@mail.ru',
            'theme.max' => 'Максимальная длина 255 знаков',
            'name.max' => 'Максимальная длина 255 знаков',
            'email.max' => 'Максимальная длина 255 знаков',
            'file.file' => 'Загружаемый объект должен быть файлом',
            'file.max' => 'Максимальный размер изображение 16мб',
        ];
    }
}
