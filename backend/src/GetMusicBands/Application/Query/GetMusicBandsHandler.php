<?php

declare(strict_types=1);

namespace App\GetMusicBands\Application\Query;

use App\Shared\Domain\MusicBand;
use App\Shared\Domain\MusicBandRepositoryInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class GetMusicBandsHandler
{
    public function __construct(
        private readonly MusicBandRepositoryInterface $musicBandRepository,
    ) {
    }

    public function __invoke(GetMusicBands $query): MusicBandsResponse
    {
        $musicBands = $this->musicBandRepository->list();

        $musicBandResponses = array_map(static function (MusicBand $musicBand) {
            return new MusicBandResponse(
                id: $musicBand->getId(),
                name: $musicBand->getName(),
                originCountry: $musicBand->getOriginCountry(),
                originCity: $musicBand->getOriginCity(),
                startingYear: $musicBand->getStartingYear(),
                bandSplitYear: $musicBand->getBandSplitYear(),
                founders: $musicBand->getFounders(),
                membersCount: $musicBand->getMembersCount(),
                musicalMovement: $musicBand->getMusicalMovement(),
                description: $musicBand->getDescription(),
            );
        }, $musicBands);

        return new MusicBandsResponse(...$musicBandResponses);
    }
}
