<?php

namespace App\Domains\Book\Requests;

use App\Domains\Book\Models\Book;
use App\Domains\Book\Services\BookService;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        /** @var Book $book */
        $book = $this->route('libro');

        return app(BookService::class)->updateRules($book);
    }
}
