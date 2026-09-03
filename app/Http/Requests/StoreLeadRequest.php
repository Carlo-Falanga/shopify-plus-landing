<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLeadRequest extends FormRequest
{
    protected $redirect = '/#richiesta';
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->filled('store_url') && ! str_starts_with($this->store_url, 'http')) {
            $this->merge(['store_url' => 'https://'.$this->store_url]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'store_url' => ['required', 'url', 'max:255'],
            'current_platform' => ['required', Rule::in(['woocommerce', 'magento', 'prestashop', 'shopify', 'custom', 'other'])],
            'monthly_orders' => ['nullable', Rule::in(['0-500', '500-2000', '2000-10000', '10000+'])],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Inserisci il tuo nome.',
            'name.max' => 'Il tuo nome è troppo lungo.',
            'email.required' => 'Inserisci la tua mail.',
            'email.email' => 'Questa email non sembra valida.',
            'email.max' => "L'email è troppo lunga.",
            'store_url.required' => "Inserisci l'indirizzo del tuo negozio.",
            'store_url.url' => "L'indirizzo del negozio non sembra valido.",
            'store_url.max' => "L'indirizzo è troppo lungo.",
            'current_platform.required' => 'Seleziona la piattaforma che usi oggi.',
            'current_platform.in' => 'Seleziona una delle piattaforme proposte.',
            'monthly_orders.in' => 'Seleziona una delle fasce proposte',
        ];
    }
}
