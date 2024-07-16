<?php

namespace App\Repository;

use App\Entity\CacesDate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CacesDate>
 *
 * @method CacesDate|null find($id, $lockMode = null, $lockVersion = null)
 * @method CacesDate|null findOneBy(array $criteria, array $orderBy = null)
 * @method CacesDate[]    findAll()
 * @method CacesDate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CacesDateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CacesDate::class);
    }

    public function add(CacesDate $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CacesDate $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //    /**
    //     * @return CacesDate[] Returns an array of CacesDate objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?CacesDate
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function getObsoleteDate(): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "select * from caces_date cd, workers w, categories c, normes n 
            where 
	            cd.categories_id = c.id 
	            and cd.workers_id = w.id 
	            and c.id_normes_id = n.id 
	            and ((year(curdate()) - year(cd.obtention_date)) > n.update_year)
            order by cd.obtention_date ASC;";
        $requete = $conn->prepare($sql);
        $requete = $conn->query($sql);
        $Note1 = $requete->fetchall();
        return $Note1;
    }
}
