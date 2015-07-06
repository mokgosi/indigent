<?php

namespace Acme\HelloBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Location;

class LoadErfTypeData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $loc = new Location();
        $loc->setName('Residential');
        $loc->setCode(0001);
        $loc->setXCoord('012345678');
        $loc->setYCoord('-2012345678');
        $loc->setErfCreated(new \DateTime('now'));
        $loc->setErfUpated(new \DateTime('now'));
        
        $manager->persist($loc);
        $manager->flush();
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}
