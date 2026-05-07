<?php

namespace App\Commands\Authors;

final readonly class DeleteAuthorCommand
{
    public function __construct(public int $authorId) {}
}
