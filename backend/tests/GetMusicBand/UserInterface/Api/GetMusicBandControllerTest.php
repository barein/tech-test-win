<?php

declare(strict_types=1);

namespace GetMusicBand\UserInterface\Api;

use Fixtures\Factory\MusicBandFactory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Uid\Ulid;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

class GetMusicBandControllerTest extends WebTestCase
{
    use Factories;
    use ResetDatabase;

    public function testGetMusicBandFailsIfMusicBandDoesNotExist(): void
    {
        MusicBandFactory::createMany(1);

        static::ensureKernelShutdown();
        $client = static::createClient();
        $client->request(Request::METHOD_GET, sprintf('/music-bands/%s', new Ulid()));

        self::assertResponseStatusCodeSame(404);
    }

    public function testGetMusicBandSuccessfully(): void
    {
        $musicBandId = new Ulid();
        MusicBandFactory::createOne(['id' => $musicBandId]);

        static::ensureKernelShutdown();
        $client = static::createClient();
        $client->request(Request::METHOD_GET, sprintf('/music-bands/%s', $musicBandId));
        $payload = $client->getResponse()->getContent();
        $musicBand = json_decode(json: $payload, associative: true, flags: JSON_THROW_ON_ERROR);

        self::assertResponseStatusCodeSame(200);

        $expectedKeys = [
            'id',
            'name',
            'description',
            'originCountry',
            'originCity',
            'startingYear',
            'bandSplitYear',
            'founders',
            'membersCount',
            'musicalMovement',
        ];

        foreach ($expectedKeys as $expectedKey) {
            self::assertArrayHasKey($expectedKey, $musicBand);
        }
    }
}
