<?php

declare(strict_types=1);

namespace App\GetMusicBand\Application\Query;

readonly class GetMusicBand
{
    public function __construct(
        public string $musicBandId,
    ) {
    }
}
