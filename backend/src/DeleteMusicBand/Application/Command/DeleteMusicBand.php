<?php

declare(strict_types=1);

namespace App\DeleteMusicBand\Application\Command;

readonly class DeleteMusicBand
{
    public function __construct(
        public string $musicBandId,
    ) {
    }
}
