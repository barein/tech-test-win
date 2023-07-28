<?php

declare(strict_types=1);

namespace App\GetMusicBand\Application\Query;

use App\Shared\Domain\MusicBandRepositoryInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Uid\Ulid;

#[AsMessageHandler]
readonly class GetMusicBandHandler
{
    public function __construct(
        private MusicBandRepositoryInterface $musicBandRepository,
    ) {
    }

    public function __invoke(GetMusicBand $query): MusicBandResponse
    {
        $musicBand = $this->musicBandRepository->get(new Ulid($query->musicBandId));

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
    }
}
