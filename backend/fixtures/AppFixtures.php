<?php

declare(strict_types=1);

namespace Fixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Fixtures\Factory\MusicBandFactory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        MusicBandFactory::createMany(15);

        $manager->flush();
    }
}
