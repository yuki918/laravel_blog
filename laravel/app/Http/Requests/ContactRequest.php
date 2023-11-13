<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // false から true に変更
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
          'name'    => ['required', 'string', 'max:30'],
          'email'   => ['required', 'email'],
          'content' => ['required', 'string', 'max:1000'],
        ];
      
        return $rules;
    }

    // /lang/ja/validation.php で指定した内容を変更する場合に設定する必要がある
    public function attributes()
    {
      return [
          'name'    => 'お名前',
          'email'   => 'メールアドレス',
          'content' => 'お問い合わせ内容',
      ];
    }

    // エラーメッセージ
    public function messages()
    {
        return [
            'name.required' => 'お名前は必須項目です',
            'email.email'   => 'メールアドレスの形式で入力してください',
            'content.required' => 'お問い合わせ内容は必須項目です',
        ];
    }
}
