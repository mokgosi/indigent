<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Rate;

class LoadRateData extends AbstractFixture  implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $loc = new Rate();
        $loc->setAmount(100);
        $loc->setVat(14);
        $loc->setStatus('Active');
        $loc->setCreated(new \DateTime('now'));
        $loc->setUpdated(new \DateTime('now'));
        
        $manager->persist($loc);
        $manager->flush();
        
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 11; // the order in which fixtures will be loaded
    }
}
