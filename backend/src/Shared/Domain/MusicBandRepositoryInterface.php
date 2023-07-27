<?php

declare(strict_types=1);

namespace App\Shared\Domain;

interface MusicBandRepositoryInterface
{
    /**
     * @return MusicBand[]
     */
    public function list(): array;
}
