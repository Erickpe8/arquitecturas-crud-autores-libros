<?php

namespace App\Infrastructure\Persistence\Eloquent;

/**
 * Normaliza atributos de fecha de Eloquent (string desde BD, Carbon, etc.).
 */
final class EloquentDate
{
    public static function toYmd(mixed $value): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }
        if ($value instanceof \DateTimeInterface) {
            return $value->format('Y-m-d');
        }
        if (is_string($value)) {
            return strlen($value) >= 10 ? substr($value, 0, 10) : $value;
        }

        return null;
    }
}
