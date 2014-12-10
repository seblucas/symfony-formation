<?php

namespace QD\SuperBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Description of DossierRepository
 *
 * @author formation
 */
class DossierRepository extends EntityRepository {
    //put your code here
    /**
     * 
     * @param type $id
     * @return \QD\SuperBundle\Entity\Dossier
     */
    public function findWithDeps($id) {
        $query = $this->createQueryBuilder('d')
            ->leftJoin("d.paragraphes", "p")
            ->leftJoin("p.image", "i")
            ->andWhere('d.id = :id')
            ->setParameter('id', $id)
            ->orderBy('p.ordre', 'ASC')
            ->addSelect('p', 'i')
            ->getQuery();
        
        return $query->getOneOrNullResult();
        
    }
    
    /**
     * 
     * @param type $id
     * @return array
     */
    public function findAllWithCount() {
        $query = $this->createQueryBuilder('d')
            ->leftJoin("d.paragraphes", "p")
            ->groupBy('d')
            ->addSelect('count(p) as nombre')
            ->getQuery();
        
        return $query->getResult();
        
    }
}
