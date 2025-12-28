<?php

namespace App\Http\Requests\Tagihan;

use Illuminate\Foundation\Http\FormRequest;

class StoreTagihanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'santri_id'     => 'required|exists:santris,id',
            'bulan'         => ['required', 'date_format:Y-m'],
            'total_tagihan' => 'required|numeric|min:1',
        ];
    }
}
