<?php

declare(strict_types=1);

namespace GetMusicBands\UserInterface\Api;

use Fixtures\Factory\MusicBandFactory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

class GetMusicBandsControllerTest extends WebTestCase
{
    use Factories;
    use ResetDatabase;

    public function test_get_music_bands_successfully(): void
    {
        MusicBandFactory::createMany(5);

        self::ensureKernelShutdown();
        $client = static::createClient();
        $client->request(Request::METHOD_GET, '/music-bands');
        $payload = $client->getResponse()->getContent();
        $musicBands = json_decode(json: $payload, associative: true, flags: JSON_THROW_ON_ERROR);

        self::assertCount(5, $musicBands);

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
            'musicalMovement'
        ];

        foreach ($expectedKeys as $expectedKey) {
            self::assertArrayHasKey($expectedKey, $musicBands[0]);
        }
    }

}
