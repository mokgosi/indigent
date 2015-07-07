<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Erf;

class LoadErfData extends AbstractFixture  implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $erf = new Erf();
        $erf->setErfType($this->getReference('ref-erfType'));
        $erf->setErfNo('A200');
        $erf->setStreetName('Street name 1');
        $erf->setSection($this->getReference('ref-section'));
        $erf->setLocation($this->getReference('ref-location'));
        $erf->setOwnerFirstName('Owner');
        $erf->setOwnerLastName('Owner');
        $erf->setOwnerMobile('0720112966');
        $erf->setOwnerTelephone('0123464545');
        $erf->setOwnerEmail('owner@mail.com');
        $erf->setOwnerAddress('800 Church street');
        $erf->setOwnerIdNo('1234567891234');
        $erf->setCreated(new \DateTime('now'));
        $erf->setUpdated(new \DateTime('now'));
        
        $manager->persist($erf);
        $manager->flush();
        
        $this->addReference('ref-erf', $erf);
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 4; // the order in which fixtures will be loaded
    }
}
