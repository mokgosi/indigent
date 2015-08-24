<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Location;

class LoadLocationData extends AbstractFixture  implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $loc = new Location();
        $loc->setName('Reagile');
        $loc->setCode(0001);
        $loc->setXCoord('012345678');
        $loc->setYCoord('-2012345678');
        $loc->setCreated(new \DateTime('now'));
        $loc->setUpdated(new \DateTime('now'));
        
        $manager->persist($loc);
        $manager->flush();
        
        $this->addReference('ref-location', $loc);
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}
