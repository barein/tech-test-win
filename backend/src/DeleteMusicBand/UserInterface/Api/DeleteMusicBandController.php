<?php

declare(strict_types=1);

namespace App\DeleteMusicBand\UserInterface\Api;

use App\DeleteMusicBand\Application\Command\DeleteMusicBand;
use App\Shared\Application\Bus\CommandBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Requirement\Requirement;

class DeleteMusicBandController extends AbstractController
{
    public function __construct(
        private CommandBusInterface $commandBus,
    ) {
    }

    #[Route(path: '/music-bands/{id}', requirements: ['id' => Requirement::ULID], methods: Request::METHOD_DELETE)]
    public function __invoke(string $id): JsonResponse
    {
        $this->commandBus->command(new DeleteMusicBand($id));

        return new JsonResponse(null, 204);
    }
}
