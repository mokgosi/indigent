<?php

namespace Acme\HelloBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Section;

class LoadSectionData  extends AbstractFixture  implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $sec = new Section();
        $sec->setName('Section 1');
        $sec->setLocation($this->getReference('ref-location'));
        $sec->setXCoord('012345678');
        $sec->setYCoord('-2012345678');
        $sec->setCreated(new \DateTime('now'));
        $sec->setUpdated(new \DateTime('now'));
        
        $manager->persist($sec);
        $manager->flush();
        
        $this->addReference('ref-section', $sec);
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}
