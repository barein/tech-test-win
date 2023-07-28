<?php

declare(strict_types=1);

namespace App\DeleteMusicBand\Application\Command;

use App\Shared\Domain\MusicBandRepositoryInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Uid\Ulid;

#[AsMessageHandler]
readonly class DeleteMusicBandHandler
{
    public function __construct(
        private MusicBandRepositoryInterface $musicBandRepository,
    ) {
    }

    public function __invoke(DeleteMusicBand $command): void
    {
        $this->musicBandRepository->delete(new Ulid($command->musicBandId));
    }
}
