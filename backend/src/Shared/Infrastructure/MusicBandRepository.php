<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure;

use App\Shared\Domain\MusicBand;
use App\Shared\Domain\MusicBandRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MusicBand>
 *
 * @method null|MusicBand find($id, $lockMode = null, $lockVersion = null)
 * @method null|MusicBand findOneBy(array $criteria, array $orderBy = null)
 * @method MusicBand[]    findAll()
 * @method MusicBand[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MusicBandRepository extends ServiceEntityRepository implements MusicBandRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MusicBand::class);
    }

    /**
     * @return MusicBand[]
     */
    public function list(): array
    {
        return $this->findAll();
    }
}
