<?php

namespace App\Repository;

use App\Entity\MahlerDiscs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MahlerDiscs>
 *
 * @method MahlerDiscs|null find($id, $lockMode = null, $lockVersion = null)
 * @method MahlerDiscs|null findOneBy(array $criteria, array $orderBy = null)
 * @method MahlerDiscs[]    findAll()
 * @method MahlerDiscs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MahlerDiscsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MahlerDiscs::class);
    }

    public function save(MahlerDiscs $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(MahlerDiscs $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return MahlerDiscs[] Returns an array of MahlerDiscs objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MahlerDiscs
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
