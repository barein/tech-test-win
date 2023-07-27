<?php

declare(strict_types=1);

namespace App\Shared\Domain;

use Symfony\Component\Uid\Ulid;

final class MusicBandNotFoundException extends AbstractDomainException
{
    public function __construct(
        private readonly Ulid $id,
    ) {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'music_band_not_found';
    }

    protected function errorMessage(): string
    {
        return sprintf('MusicBand %s could not be found', $this->id);
    }

    public function httpStatusCode(): HttpStatusCode
    {
        return HttpStatusCode::HTTP_NOT_FOUND;
    }
}
