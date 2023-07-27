<?php

declare(strict_types=1);

namespace App\Shared\Domain;

use Symfony\Component\Uid\Ulid;

interface MusicBandRepositoryInterface
{
    /**
     * @return MusicBand[]
     */
    public function list(): array;

    /**
     * @throws MusicBandNotFoundException
     */
    public function delete(Ulid $musicBandId): void;

    /**
     * @throws MusicBandNotFoundException
     */
    public function get(Ulid $musicBandId): MusicBand;
}
