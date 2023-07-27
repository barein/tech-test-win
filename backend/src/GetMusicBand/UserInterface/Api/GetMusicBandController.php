<?php

declare(strict_types=1);

namespace App\GetMusicBand\UserInterface\Api;

use App\GetMusicBand\Application\Query\GetMusicBand;
use App\GetMusicBand\Application\Query\MusicBandResponse;
use App\Shared\Application\Bus\QueryBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Requirement\Requirement;

class GetMusicBandController extends AbstractController
{
    public function __construct(
        private QueryBusInterface $queryBus,
    ) {
    }

    #[Route(path: '/music-bands/{id}', requirements: ['id' => Requirement::ULID], methods: Request::METHOD_GET)]
    public function __invoke(string $id): JsonResponse
    {
        /** @var MusicBandResponse $musicBandResponse */
        $musicBandResponse = $this->queryBus->query(new GetMusicBand($id));

        return $this->json($musicBandResponse);
    }
}
