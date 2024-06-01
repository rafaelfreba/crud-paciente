<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cpf' => ['required', 'string', 'cpf'],
            'cns' => ['required', 'string', 'cns'],
            'name' => ['required', 'string', 'max:255'],
            'birth' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'celular_com_ddd'],
            'county_id' => ['required', 'numeric', 'between:1,142']
        ];
    }

    protected function prepareForValidation()
    {
        return $this->merge([
            'cpf' => str_replace(['.', '-'], '', $this->cpf),
            'cns' => str_replace(['.'], '', $this->cns),
            'phone' => str_replace(['-',')','(',' '], '', $this->phone),
        ]);
    }
}
