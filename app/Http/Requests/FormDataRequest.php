<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// use App\Rules\UniqueBrand;

class FormDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    } 

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return
     [
        
            'prodbrand'=>['required','min:2'],
            
            // 'prod_brand'=> ['required', 'string', new UniqueBrand]

        ];
    }
    
    public function messages()
    {
        return[
            'prodbrand.required'=>'Brand is required!',
            'prodbrand.min'=>'Must be 2 Char and above.',
            
            // 'prodbrand.unique'=>'Brand is already added'
        ];
    }
}
