<?php

namespace App\Core\Services;

/**
 * Reglas de negocio para URL de portada (sin dependencias de Laravel).
 */
final class BookCoverUrlGenerator
{
    public static function resolve(?string $portada, string $titulo): string
    {
        if ($portada !== null && $portada !== '') {
            if (filter_var($portada, FILTER_VALIDATE_URL)) {
                return $portada;
            }

            return '/storage/'.$portada;
        }

        $title = rawurlencode(self::limitTitle($titulo, 40));
        $hash = abs(crc32($titulo));

        $backgrounds = [
            '0f172a', '1e1b4b', '172554', '052e16', '3f6212',
            '3b0764', '7f1d1d', '422006', '0c4a6e', '111827',
        ];
        $foregrounds = [
            'e2e8f0', 'f8fafc', 'fde68a', 'd9f99d', 'bfdbfe',
            'fecdd3', 'fdba74', 'ddd6fe', 'a7f3d0', 'f5f5f4',
        ];

        $bg = $backgrounds[$hash % count($backgrounds)];
        $fg = $foregrounds[$hash % count($foregrounds)];

        return "https://dummyimage.com/600x900/{$bg}/{$fg}&text={$title}";
    }

    private static function limitTitle(string $titulo, int $max): string
    {
        if (strlen($titulo) <= $max) {
            return $titulo;
        }

        return substr($titulo, 0, $max);
    }
}
