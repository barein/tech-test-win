<?php

declare(strict_types=1);

namespace App\GetMusicBands\UserInterface\Api;

use App\GetMusicBands\Application\Query\GetMusicBands;
use App\GetMusicBands\Application\Query\MusicBandsResponse;
use App\Shared\Application\Bus\QueryBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GetMusicBandsController extends AbstractController
{
    public function __construct(
        private QueryBusInterface $queryBus,
    ) {
    }

    #[Route(path: '/music-bands', methods: Request::METHOD_GET)]
    public function __invoke(): JsonResponse
    {
        /** @var MusicBandsResponse $musicBands */
        $musicBands = $this->queryBus->query(new GetMusicBands());

        return $this->json($musicBands->getMusicBands());
    }
}
