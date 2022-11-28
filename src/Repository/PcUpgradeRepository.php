<?php

namespace App\Repository;

use App\Entity\PcUpgrade;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PcUpgrade>
 *
 * @method PcUpgrade|null find($id, $lockMode = null, $lockVersion = null)
 * @method PcUpgrade|null findOneBy(array $criteria, array $orderBy = null)
 * @method PcUpgrade[]    findAll()
 * @method PcUpgrade[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PcUpgradeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PcUpgrade::class);
    }

    public function add(PcUpgrade $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PcUpgrade $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return PcUpgrade[] Returns an array of PcUpgrade objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PcUpgrade
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
