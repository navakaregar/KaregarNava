<?php

namespace App\Search;

use Doctrine\ORM\EntityManager;
use App\Entity\Hotel;


class SearchHotel
{
    private EntityManager $entityManager;
    public function __construct(EntityManager $entityManager)
    {
        $this->$entityManager=$entityManager;
    }
    public function search($in){
       $hotelRepository= $this->entityManager->getRepository(Hotel::class);
        return $hotelRepository->createQueryBuilder('h')
            ->where('h.name like:h1 ')
            ->setParameter('h1','%'.$in.'%')
            ->getQuery()
            ->getResult();


    }
}