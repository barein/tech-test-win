<?php

declare(strict_types=1);

namespace App\GetMusicBand\Application\Query;

use Symfony\Component\Uid\Ulid;

readonly class MusicBandResponse
{
    public function __construct(
        public Ulid $id,
        public string $name,
        public string $originCountry,
        public string $originCity,
        public int $startingYear,
        public ?int $bandSplitYear,
        public ?string $founders,
        public ?int $membersCount,
        public ?string $musicalMovement,
        public string $description,
    ) {
    }
}
