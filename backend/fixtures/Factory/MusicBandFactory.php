<?php

declare(strict_types=1);

namespace Fixtures\Factory;

use App\Shared\Domain\MusicBand;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Uid\Ulid;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<MusicBand>
 *
 * @method        MusicBand|Proxy create(array|callable $attributes = [])
 * @method static MusicBand|Proxy createOne(array $attributes = [])
 * @method static MusicBand|Proxy find(array|mixed|object $criteria)
 * @method static MusicBand|Proxy findOrCreate(array $attributes)
 * @method static MusicBand|Proxy first(string $sortedField = 'id')
 * @method static MusicBand|Proxy last(string $sortedField = 'id')
 * @method static MusicBand|Proxy random(array $attributes = [])
 * @method static MusicBand|Proxy randomOrCreate(array $attributes = [])
 * @method static EntityRepository|RepositoryProxy repository()
 * @method static MusicBand[]|Proxy[] all()
 * @method static MusicBand[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static MusicBand[]|Proxy[] createSequence(callable|iterable $sequence)
 * @method static MusicBand[]|Proxy[] findBy(array $attributes)
 * @method static MusicBand[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static MusicBand[]|Proxy[] randomSet(int $number, array $attributes = [])
 *
 * @phpstan-method        Proxy<MusicBand> create(array|callable $attributes = [])
 * @phpstan-method static Proxy<MusicBand> createOne(array $attributes = [])
 * @phpstan-method static Proxy<MusicBand> find(object|array|mixed $criteria)
 * @phpstan-method static Proxy<MusicBand> findOrCreate(array $attributes)
 * @phpstan-method static Proxy<MusicBand> first(string $sortedField = 'id')
 * @phpstan-method static Proxy<MusicBand> last(string $sortedField = 'id')
 * @phpstan-method static Proxy<MusicBand> random(array $attributes = [])
 * @phpstan-method static Proxy<MusicBand> randomOrCreate(array $attributes = [])
 * @phpstan-method static RepositoryProxy<MusicBand> repository()
 * @phpstan-method static list<Proxy<MusicBand>> all()
 * @phpstan-method static list<Proxy<MusicBand>> createMany(int $number, array|callable $attributes = [])
 * @phpstan-method static list<Proxy<MusicBand>> createSequence(iterable|callable $sequence)
 * @phpstan-method static list<Proxy<MusicBand>> findBy(array $attributes)
 * @phpstan-method static list<Proxy<MusicBand>> randomRange(int $min, int $max, array $attributes = [])
 * @phpstan-method static list<Proxy<MusicBand>> randomSet(int $number, array $attributes = [])
 */
final class MusicBandFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'id' => new Ulid(),
            'name' => self::faker()->sentence(nbWords: 3),
            'originCountry' => self::faker()->country(),
            'originCity' => self::faker()->city(),
            'startingYear' => (int) self::faker()->year,
            'bandSplitYear' => self::faker()->randomElements([(int) self::faker()->year, null])[0],
            'founders' => self::faker()->randomElements([$this->generateFoundersList(), null])[0],
            'membersCount' => self::faker()->randomElements([random_int(1, 10), null])[0],
            'musicalMovement' => self::faker()->randomElements([
                'Pop music',
                'Hip hop music',
                'Rock music',
                'Rhythm and blues',
                'Reggae',
                'Jazz',
                null,
            ])[0],
            'description' => self::faker()->text(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(MusicBand $musicBand): void {})
        ;
    }

    protected static function getClass(): string
    {
        return MusicBand::class;
    }

    private function generateFoundersList(): string
    {
        $founders = [];

        for ($i = 0; $i < random_int(0, 7); ++$i) {
            $founders[] = self::faker()->name();
        }

        return implode(',', $founders);
    }
}
