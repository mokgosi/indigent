<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Erf;

class LoadErfData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        
        $r=0;
        foreach (range(1, 5) as $s) {
            foreach (range(1, 10) as $i) {
                $r++;
                $erf = new Erf();
                $erf->setErfType($this->getReference('ref-erfType'));
                $erf->setErfNo($s.'200'.($i-1));
                $erf->setOwner($this->getReference('ref-owner'));
                $erf->setAddress($s.' Street Name');
                $erf->setSection($this->getReference('ref-section'.$s));
                $erf->setLocation($this->getReference('ref-location'));
                $erf->setBalance(800);
                $erf->setCreated(new \DateTime('now'));
                $erf->setUpdated(new \DateTime('now'));
                $manager->persist($erf);
                
                $this->addReference('ref-erf'.$r, $erf);
            }
        }

        $manager->flush();

    }

    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 5; // the order in which fixtures will be loaded
    }

}
