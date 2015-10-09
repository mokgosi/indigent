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
        $loc->setName('Koster');
        $loc->setCode('0348');
        $loc->setXCoord('-25.868586');
        $loc->setYCoord('26.878511');
        $loc->setCreated(new \DateTime('now'));
        $loc->setUpdated(new \DateTime('now'));
        
        $loc1 = new Location();
        $loc1->setName('Derby');
        $loc1->setCode('0347');
        $loc1->setXCoord('-25.9395045');
        $loc1->setYCoord('27.018035');
        $loc1->setCreated(new \DateTime('now'));
        $loc1->setUpdated(new \DateTime('now'));
        
        $loc2 = new Location();
        $loc2->setName('Swartruggens');
        $loc2->setCode('2835');
        $loc2->setXCoord('-25.6419504');
        $loc2->setYCoord('26.6875125');
        $loc2->setCreated(new \DateTime('now'));
        $loc2->setUpdated(new \DateTime('now'));
        
        $manager->persist($loc);
        $manager->persist($loc1);
        $manager->persist($loc2);
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
