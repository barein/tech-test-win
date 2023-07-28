<?php

declare(strict_types=1);

namespace DeleteMusicBand\UserInterface\Api;

use Fixtures\Factory\MusicBandFactory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Uid\Ulid;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

class DeleteMusicBandControllerTest extends WebTestCase
{
    use Factories;
    use ResetDatabase;

    public function testDeleteMusicBandFailsIfMusicBandDoesNotExist(): void
    {
        MusicBandFactory::createMany(1);

        static::ensureKernelShutdown();
        $client = static::createClient();
        $client->request(Request::METHOD_DELETE, sprintf('/music-bands/%s', new Ulid()));

        self::assertResponseStatusCodeSame(404);
    }

    public function testDeleteMusicBandSuccessfully(): void
    {
        $musicBandId = new Ulid();
        MusicBandFactory::createOne(['id' => $musicBandId]);

        static::ensureKernelShutdown();
        $client = static::createClient();
        $client->request(Request::METHOD_DELETE, sprintf('/music-bands/%s', $musicBandId));

        self::assertResponseStatusCodeSame(204);
    }
}
