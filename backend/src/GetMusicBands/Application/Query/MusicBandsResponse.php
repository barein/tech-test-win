<?php

declare(strict_types=1);

namespace App\GetMusicBands\Application\Query;

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
