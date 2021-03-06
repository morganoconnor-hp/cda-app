<?php

namespace App\Repository;

use App\Entity\Level;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Level|null find($id, $lockMode = null, $lockVersion = null)
 * @method Level|null findOneBy(array $criteria, array $orderBy = null)
 * @method Level[]    findAll()
 * @method Level[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LevelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Level::class);
    }

    public function listLevel()
    {
        $qb = $this->createQueryBuilder('lvl');

        $qb
            ->distinct('lvl')
            ->andWhere('lvl.id IS NOT NULL')
            ->orderBy('lvl.codeNum', 'ASC')
        ;

        $query = $qb->getQuery();

        return $query->execute();
    }
}
