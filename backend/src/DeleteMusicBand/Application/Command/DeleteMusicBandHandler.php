<?php

declare(strict_types=1);

namespace App\DeleteMusicBand\Application\Command;

use App\Shared\Domain\MusicBandRepositoryInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Uid\Ulid;

#[AsMessageHandler]
class DeleteMusicBandHandler
{
    public function __construct(
        private readonly MusicBandRepositoryInterface $musicBandRepository,
    ) {
    }

    public function __invoke(DeleteMusicBand $command): void
    {
        $musicBandId = new Ulid($command->musicBandId);

        $this->musicBandRepository->delete($musicBandId);
    }
}
