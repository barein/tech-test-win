<?php

declare(strict_types=1);

namespace App\GetMusicBands\Application\Query;

use App\GetMusicBand\Application\Query\MusicBandResponse;

class MusicBandsResponse
{
    /** @var MusicBandResponse[] */
    private array $musicBands;

    public function __construct(MusicBandResponse ...$musicBands)
    {
        $this->musicBands = $musicBands;
    }

    /**
     * @return MusicBandResponse[]
     */
    public function getMusicBands(): array
    {
        return $this->musicBands;
    }
}
