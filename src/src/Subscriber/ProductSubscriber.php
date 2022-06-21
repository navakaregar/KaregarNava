<?php

namespace App\Subscriber;

use App\Entity\Product;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;
use Symfony\Component\Security\Core\Security;


class ProductSubscriber implements EventSubscriber
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    public function getSubscribedEvents()
    {
        return array(
            Events::prePersist,
            Events::preUpdate,
        );
    }

    public function prePersist(LifecycleEventArgs $args){
        $entity = $args->getObject();
        if($entity instanceof Product){
            $entity -> setCreatedAt(new \DateTimeImmutable());
            $entity -> setUpdatedAt(new \DateTimeImmutable);
            $entity -> setCreatedUser($this->security->getUser()->getEmail());
            $entity -> setUpdatedAUser($this->security->getUser()->getEmail());
        }
    }
    public function preUpdate(LifecycleEventArgs $args){
        $entity = $args->getObject();
        if($entity instanceof Product){
            $entity -> setUpdatedAt(new \DateTimeImmutable());
            $entity -> setUpdatedAUser($this->security->getUser().getUsername().getEmail());
        }
    }
}