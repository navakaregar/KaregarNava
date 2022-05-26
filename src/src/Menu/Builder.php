<?php

namespace App\Menu;


use App\Entity\Blog;
use Doctrine\ORM\EntityManager;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class Builder
{
    private EntityManager $entityManager;
    private FactoryInterface $factory;
   public function __construct(EntityManager $entityManager,FactoryInterface $factory)
   {
       $this->$entityManager=$entityManager;
       $this->factory=$factory;
   }

    public function mainMenu(array $options): ItemInterface
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Home', ['route' => 'home']);
        $menu->addChild('About Us', ['route' => 'home']);
        $menu->addChild('Contact Us', ['route' => 'home']);

        $hotelMenu= $menu->addChild('Hotel', ['route' => 'hotel']);
        $hotels=$this->entityManager->getRepository(Hotel::class)->findAll();

        foreach ($hotels as $h){
            $hotelMenu->addChild($h->getName(),[
                'route' => 'hotel_show',
                'routeParameters' => ['id' => $h->getId()]

            ]);
        }
        return $menu;
    }
}