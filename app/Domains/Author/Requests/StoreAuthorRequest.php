<?php

namespace App\Domains\Author\Requests;

use App\Domains\Author\Services\AuthorService;
use Illuminate\Foundation\Http\FormRequest;

class StoreAuthorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return app(AuthorService::class)->rules();
    }
}
