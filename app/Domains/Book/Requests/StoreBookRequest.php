<?php

namespace App\Domains\Book\Requests;

use App\Domains\Book\Services\BookService;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return app(BookService::class)->storeRules();
    }
}
