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
        $sec->setName('Senthumole');
        $sec->setLocation($this->getReference('ref-location'));
        $sec->setXCoord('012345678');
        $sec->setYCoord('-2012345678');
        $sec->setCreated(new \DateTime('now'));
        $sec->setUpdated(new \DateTime('now'));
        
        $sec1 = new Section();
        $sec1->setName('Mavista');
        $sec1->setLocation($this->getReference('ref-location'));
        $sec1->setXCoord('012345678');
        $sec1->setYCoord('-2012345678');
        $sec1->setCreated(new \DateTime('now'));
        $sec1->setUpdated(new \DateTime('now'));
        
        $sec2 = new Section();
        $sec2->setName('Extension 4');
        $sec2->setLocation($this->getReference('ref-location'));
        $sec2->setXCoord('012345678');
        $sec2->setYCoord('-2012345678');
        $sec2->setCreated(new \DateTime('now'));
        $sec2->setUpdated(new \DateTime('now'));
        
        $sec3 = new Section();
        $sec3->setName('Hospital View');
        $sec3->setLocation($this->getReference('ref-location'));
        $sec3->setXCoord('012345678');
        $sec3->setYCoord('-2012345678');
        $sec3->setCreated(new \DateTime('now'));
        $sec3->setUpdated(new \DateTime('now'));
        
        $sec4 = new Section();
        $sec4->setName('Mountain View');
        $sec4->setLocation($this->getReference('ref-location'));
        $sec4->setXCoord('012345678');
        $sec4->setYCoord('-2012345678');
        $sec4->setCreated(new \DateTime('now'));
        $sec4->setUpdated(new \DateTime('now'));
        
        $manager->persist($sec);
        $manager->persist($sec1);
        $manager->persist($sec2);
        $manager->persist($sec3);
        $manager->persist($sec4);
        
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
